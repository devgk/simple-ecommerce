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
            $table->string('order_id');
            $table->string('ref_no');
            $table->integer('user_id')->unsigned();
            $table->string('user_name');
            $table->string('user_mobile');
            $table->string('user_email');
            $table->string('user_address');
            $table->string('product_name');
            $table->string('product_image');
            $table->integer('quantity')->unsigned();
            $table->double('price')->unsigned();
            $table->double('total_price')->unsigned();
            $table->enum('order_status', ['completed', 'incomplete']);
            $table->double('discount')->unsigned()->nullable();
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
