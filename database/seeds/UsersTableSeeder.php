<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'kounosuke',
            'email' =>'kounosuke@gmail.com',
            'password' => 'userpass',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
