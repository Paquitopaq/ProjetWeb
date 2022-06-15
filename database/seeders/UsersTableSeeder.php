<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => \Hash::make('user1234'),
            'droit'=>0
        ]);

        \DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => \Hash::make('admin123'),
            'droit'=>1
        ]);

        \DB::table('users')->insert([
            'name' => 'dev',
            'email' => 'dev@gmail.com',
            'password' => \Hash::make('dev1234'),
            'droit'=>1
        ]);
    }
}
