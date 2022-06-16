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
            'id'=>1,
            'name'=> 'Projet1',
        ]);
        \DB::table('categories')->insert([
            'id'=>2,
            'name'=> 'Projet2',
        ]);
        \DB::table('categories')->insert([
            'id'=>3,
            'name'=> 'Projet3',
        ]);
    }
}
