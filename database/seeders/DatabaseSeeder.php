<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::insert([
        //     'name' => Str::random(100),
        //     'email' => Str::random(100).'@gmail.com',
        //     'password' => Hash::make('password'),
        // ]);
        Utilisateur::factory(1000)->create();
        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            ]);
        $this->call([
            PostTableSeeder::class,
            ]);
        // \App\Models\User::factory(10)->create();
    }
}
