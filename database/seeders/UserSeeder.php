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
        // Reset database
        // DB::statement('SET FOREIGN_KEY_CHECKS=0');
        // DB::table('model_has_roles')->truncate();
        // DB::table('model_has_permissions')->truncate();
        // DB::table('team_user')->truncate();
        // DB::table('users')->truncate();
        // DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Array teams
        $teams = [
            [
                'name' => 'Team A',
                'slug' => 'team-a',
            ],
        ];

        // Create Super Admin
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('@Iamsuperadmin'),
        ]);
        // Assign role to super admin
        $superAdmin->assignRole('super_admin');



        // Loop untuk setiap team
        foreach ($teams as $teamSlug) {
            $team = Team::where('slug', $teamSlug)->first();

            if (!$team) {
                continue;
            }

            // Attach super admin ke semua team
            $superAdmin->teams()->attach($team->id);
        }
    }
}
