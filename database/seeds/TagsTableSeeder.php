<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TagsTableSeeder extends Seeder{

    public function run() {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            DB::table('tags')->insert([
                'name'          => $faker->company,
                'description'   => $faker->paragraph(4)
            ]);
        }
    }
}