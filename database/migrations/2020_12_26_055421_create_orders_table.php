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
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->integer('category_id')->unsigned();
            $table->json('product_id')->nullable();
            $table->json('order_qty')->nullable();
            $table->float('sale_price')->nullable();
            $table->float('coupon_discount')->nullable();
            $table->float('delivery_charge')->nullable();
            $table->json('total_amount_calculated')->nullable();
            $table->float('total_amount_payable')->nullable();
            $table->boolean('in_out_stock')->nullable();
            $table->text('advisory_information')->nullable();
            $table->text('shipping_status')->nullable();
            $table->integer('delivered')->nullable();
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
