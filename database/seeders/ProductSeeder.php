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
            'fitur' => '<p style="text-align: center; "><span style="font-family: Arial;">Desain Starndart<br></span><span style="font-family: Arial;"> Qoutes<br></span><span style="font-family: Arial;"> Detail Acara<br></span><span style="font-family: Arial;">Profil Pasangan</span><span style="font-family: Roboto;">﻿<br></span><span style="font-family: Arial;">Prokes<br></span><span style="font-family: Arial;">Navigasi Lokasi<br></span><span style="font-family: Arial;">Google Maps<br></span><span style="font-family: Arial;">Galery Foto 3 Foto<br></span><span style="font-family: Arial;">Footer di Webiste</span></p>',
            'keterangan' => 'Product Basic',
            'image' => '20210907142932.jpg'
        ]);
    }
}
