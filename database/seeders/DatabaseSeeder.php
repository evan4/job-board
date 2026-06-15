<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\JobsList;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(300)->create();
        $users = User::inRandomOrder()->limit(20)->get();

        foreach ($users as $user) {
            Employer::factory()->create([
                'user_id' => $user->id,
            ]);
        }
        $employers = Employer::all();

        for ($i = 0; $i < 100; $i++) {
            JobsList::factory()->create([
                'employer_id' => $employers->random()->id,
            ]);
        }
    }
}
