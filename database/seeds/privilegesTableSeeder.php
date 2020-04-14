<?php

use Illuminate\Database\Seeder;

class privilegesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('privileges')->insert([
            'class' => 'plain',
        ]);
        DB::table('privileges')->insert([
            'class' => 'highlight',
        ]);
        DB::table('privileges')->insert([
            'class' => 'vip',
        ]);
    }
}
