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
            'username' => 'naufalyuwan',
            'name' => 'Naufal Yuwan Kanugraha',
            'email' => 'yuwan@gmail.com',
            'password' => 'user12345',
            'gender' => 'male',
            'bio' => 'surabaya on myway',
            'pob' => 'Lamongan',
            'dob' => Date::create(2000, 1, 1)
        ]);
        User::create([
            'username' => 'farikhnaufal',
            'name' => 'Muhammad Farikh Naufal Tajuddin',
            'email' => 'mfarikh9@gmail.com',
            'password' => 'naufal123',
            'gender' => 'male',
            'pob' => 'Lamongan',
            'bio' => 'Bismillah',
            'dob' => Date::create(2000, 1, 1)
        ]);

        User::create([
            'username' => 'ilhamramadhan',
            'name' => 'Ilham Ramadhan',
            'email' => 'ilham@gmail.com',
            'password' => 'user12345',
            'gender' => 'male',
            'pob' => 'Lamongan',
            'dob' => Date::create(2000, 1, 1)
        ]);

        User::create([
            'username' => 'mabidm',
            'name' => 'Muhammad Abid Murtadho',
            'email' => 'abid@gmail.com',
            'password' => 'user12345',
            'gender' => 'male',
            'pob' => 'Lamongan',
            'dob' => Date::create(2000, 1, 1)
        ]);
        User::create([
            'username' => 'faizalil',
            'name' => 'Faiz Alil Himmah',
            'email' => 'faiz@gmail.com',
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
