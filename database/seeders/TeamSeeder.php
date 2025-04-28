<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Team::create([
            'name' => 'Team A',
            'slug' => 'team-a',
        ])->users()->attach(User::find(1));

        Team::create([
            'name' => 'Team B',
            'slug' => 'team-b',
        ])->users()->attach(User::find(1));
    }
}
