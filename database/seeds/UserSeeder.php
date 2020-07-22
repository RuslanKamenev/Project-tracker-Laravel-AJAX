<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [];

        $users = [
            [
            'name'      => 'admin',
            'email'     => 'adm@mail.ru',
            'password'  => bcrypt('123')
            ],

            [
            'name'      => 'adm',
            'email'     => 'admin@mail.ru',
            'password'  => bcrypt('12345')
            ]

        ];

        DB::table('users')->insert($users);
    }
}
