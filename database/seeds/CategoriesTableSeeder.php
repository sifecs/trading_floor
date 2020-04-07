<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'title' => 'Стрела',
            '_lft' => '1',
            '_rgt' => '4',
            'parent_id' => null,
        ]);
        DB::table('categories')->insert([
            'title' => 'Стрела_Дочка',
            '_lft' => '2',
            '_rgt' => '3',
            'parent_id' => '1',
        ]);


    }
}
