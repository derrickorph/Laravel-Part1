<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1,100) as $index) {
            $faker= Faker::create();
            DB::table('posts')->insert([
                'title'=>$faker->sentence(5),
                'body'=>$faker->paragraph(4),
            ]);
        }

    }
}
