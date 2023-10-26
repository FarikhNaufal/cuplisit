<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'username' => 'user',
            'name' => 'My Name User',
            'email' => 'user@gmail.com',
            'password' => 'user12345',
            'gender' => 'male',
            'pob' => 'Lamongan',
            'dob' => Date::create(2000, 1, 1)
        ]);
        // 'username',
        // 'name',
        // 'email',
        // 'password',
        // 'avatar',
        // 'bio',
        // 'gender',
        // 'pob',
        // 'dob',

    }
}
