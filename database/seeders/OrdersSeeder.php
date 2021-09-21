<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('orders')->insert([
            'user_id' => '3',
            'no_orders' =>'12345678',
            'ref_number' => '1234aaaa-3453333dddd-1d3d323232',
            'status' => '0',
            'notes' => 'notes and notes'
        ]);
    }
}
