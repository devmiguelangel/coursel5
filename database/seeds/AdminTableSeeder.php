<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder {

    public function run() {
        DB::table('users')->insert([
            'first_name'    => 'Miguel',
            'last_name'     => 'Mamani Gutierrez',
            'email'         => 'djmiguelarango@gmail.com',
            'password'      => Hash::make('miguel123'),
            'type'          => 'admin'
        ]);
    }
}