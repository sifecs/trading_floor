<?php

use Illuminate\Database\Seeder;

class ComentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coments')->insert([
            'user_id' => '1',
            'product_id' => '1',
            'text' => 'Товар огонь1 ',
            'date' => '21.21.2020',
        ]);

        DB::table('coments')->insert([
            'user_id' => '1',
            'product_id' => '1',
            'text' => 'Товар огоньs ',
            'date' => '22.22.2022',
        ]);

    }
}
