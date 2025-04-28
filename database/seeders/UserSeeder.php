<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset database jika dibutuhkan
        // Uncomment jika Anda ingin mengosongkan tabel terlebih dahulu
        /*
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('model_has_roles')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('team_user')->truncate();
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        */

        // Create Super Admin jika belum ada
        $superAdmin = User::firstOrCreate(
            ['email' => 'superadmin@gmail.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('@Iamsuperadmin'),
                'is_active' => true,
            ]
        );

        // Assign role super_admin
        if (!$superAdmin->hasRole('super_admin')) {
            $superAdmin->assignRole('super_admin');
        }

        // Pastikan semua team sudah dibuat
        // Jika tidak ada team, buat default team
        if (Team::count() === 0) {
            Team::create([
                'name' => 'Team A',
                'slug' => 'team-a',
            ]);

            Team::create([
                'name' => 'Team B',
                'slug' => 'team-b',
            ]);
        }

        // Get all teams
        $teams = Team::all();

        // Pastikan superadmin terhubung dengan semua team
        foreach ($teams as $team) {
            if (!$superAdmin->teams->contains($team->id)) {
                $superAdmin->teams()->attach($team->id);
            }
        }

        // Buat user untuk setiap team
        foreach ($teams as $team) {
            // Buat admin untuk team ini jika belum ada
            $adminEmail = 'admin.' . strtolower(str_replace(' ', '', $team->slug)) . '@gmail.com';
            $admin = User::firstOrCreate(
                ['email' => $adminEmail],
                [
                    'name' => 'Admin ' . $team->name,
                    'password' => Hash::make('@Admin123'),
                    'is_active' => true,
                ]
            );

            // Assign role admin jika belum
            if (!$admin->hasRole('admin')) {
                $admin->assignRole('admin');
            }

            // Attach ke team jika belum
            if (!$admin->teams->contains($team->id)) {
                $admin->teams()->attach($team->id);
            }

            // Buat user regular untuk team ini jika belum ada
            $regularEmail = 'user.' . strtolower(str_replace(' ', '', $team->slug)) . '@gmail.com';
            $regularUser = User::firstOrCreate(
                ['email' => $regularEmail],
                [
                    'name' => 'User ' . $team->name,
                    'password' => Hash::make('@User123'),
                    'is_active' => true,
                ]
            );

            // Assign role user jika belum
            if (!$regularUser->hasRole('user')) {
                $regularUser->assignRole('user');
            }

            // Attach ke team jika belum
            if (!$regularUser->teams->contains($team->id)) {
                $regularUser->teams()->attach($team->id);
            }

            // Tampilkan output untuk debugging
            $this->command->info("Created users for {$team->name}");
        }

        $this->command->info("Total users created: " . User::count());
    }
}
