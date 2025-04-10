<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'email' => 'user1@gmail.com',
            'password' => Hash::make('123456789'),
        ]);
        Task::factory(fake()->numberBetween(15,50))->create(['user_id' => $user->id]);

        $user = User::factory()->create([
            'email' => 'user2@gmail.com',
            'password' => Hash::make('123456789'),
        ]);
        Task::factory(fake()->numberBetween(15,50))->create(['user_id' => $user->id]);

    }
}
