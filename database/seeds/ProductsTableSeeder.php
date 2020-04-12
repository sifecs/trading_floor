<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'title' => 'Игровая приставка sony playstation 4 black 1tb',
            'img' => 'https://avatars.mds.yandex.net/get-pdb/25978/69c8943b-9174-423c-87dd-f030a61df7a5/s1200?webp=false,https://avatars.mds.yandex.net/get-pdb/1927455/05d6de31-30e4-4be2-80e0-05b16dc9e4ce/s1200?webp=false',
            'discounts' => '5',
            'price' => '2000',
            'description' => '-описание товара',
            'user_id' => '1',
            'category_id' => '2',
            'shop_id' => '1',
        ]);
        DB::table('products')->insert([
            'title' => 'Мишка игровая',
            'img' => 'https://avatars.mds.yandex.net/get-pdb/25978/69c8943b-9174-423c-87dd-f030a61df7a5/s1200?webp=false,https://avatars.mds.yandex.net/get-pdb/1927455/05d6de31-30e4-4be2-80e0-05b16dc9e4ce/s1200?webp=false',
            'discounts' => '15',
            'price' => '3000',
            'description' => '-мышка игровая бла бла бла',
            'user_id' => '1',
            'category_id' => '2',
            'shop_id' => '1',
        ]);

    }
}
