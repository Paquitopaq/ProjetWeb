<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->insert([
            'name'=> 'Projet1',
        ]);
        \DB::table('categories')->insert([
            'name'=> 'Projet2',
        ]);
        \DB::table('categories')->insert([
            'name'=> 'Projet3',
        ]);
    }
}
