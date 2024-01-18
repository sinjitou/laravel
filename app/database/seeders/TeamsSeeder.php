<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Team;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //  lier les utilisateurs à une team
         $users = User::all();

         foreach ($users as $user) {
             $team = Team::factory()->create();
             $user->teams()->attach($team);
         }
    }
}