<?php

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
        DB::table('users')->insert([
            'name' => 'Сергей',
            'patronymic' => 'Александровичь',
            'surname' => 'Ерохов',
            'password' => '123',
            'phone' => '+996556103039',
            'email' => 'sifecs15@mail.ru',
            'shop_id' => '1',
        ]);
    }
}
