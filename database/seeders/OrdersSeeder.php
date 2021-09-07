<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            'product_id' => '1',
            'no_orders' =>'12345678',
            'ref_number' => '1234aaaa-3453333dddd-1d3d323232',
            'status' => '0',
            'notes' => 'notes and notes'
        ]);
    }
}
