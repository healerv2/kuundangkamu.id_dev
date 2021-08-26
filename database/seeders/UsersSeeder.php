<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       $user = [
        [
            'username' => 'superadmin',
            'name'=>'superadmin',
            'email'=>'admin@example.com',
            'phone'=>'0',
            'address'=>'mlg',
            'level'=>'superadmin',
            'password'=> bcrypt('superadmin'),
        ],
        [
            'username' => 'accounting',
            'name'=>'accounting',
            'email'=>'payment@example.com',
            'phone'=>'0',
            'address'=>'mlg',
            'level'=>'accounting',
            'password'=> bcrypt('123'),
        ],
        [
            'username' => 'user',
            'name'=>'user',
            'email'=>'user@example.com',
            'phone'=>'0',
            'address'=>'mlg',
            'level'=>'visitor',
            'password'=> bcrypt('123456'),
        ],
    ];

    foreach ($user as $key => $value) {
        User::create($value);
    }
}
}
