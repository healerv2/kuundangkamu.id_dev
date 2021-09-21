<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            /** foreignkey */
            $table->foreign('user_id')->references('id')->on('users');
            /** end foreignkey */
            $table->string('no_orders');
            $table->string('ref_number');
            $table->string('subharga')->default(0);
            $table->string('diskon')->default(0);
            $table->string('harga')->default(0);
            $table->integer('status');
            $table->string('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
