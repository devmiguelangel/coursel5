<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class AdminTableSeeder extends Seeder {

    public function run() {
        $faker = Faker::create();

        $user_id = DB::table('users')->insertGetId([
            'first_name'    => 'Miguel',
            'last_name'     => 'Mamani Gutierrez',
            'email'         => 'djmiguelarango@gmail.com',
            'password'      => Hash::make('miguel123'),
            'type'          => 'admin'
        ]);

        DB::table('user_profiles')->insert([
            'user_id'   => $user_id,
            'bio'       => $faker->paragraph(rand(2, 5)),
            'twitter'   => 'http://www.twitter.com/' . $faker->userName,
            'website'   => $faker->url,
            'birthdate'    => $faker->dateTimeBetween('-55 years', '-15 years')->format('Y-m-d')
        ]);
    }
}