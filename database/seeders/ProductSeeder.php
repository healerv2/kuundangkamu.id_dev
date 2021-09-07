<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('product')->insert([
            'name_product' => 'Basic',
            'subharga' => '100000',
            'diskon' =>'35',
            'harga' => '65000',
            'keterangan' => 'Product Basic',
            'image' => '20210907142932.jpg'
        ]);
    }
}
