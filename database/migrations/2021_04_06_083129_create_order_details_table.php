<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('order_id')->nullable()->unsigned();
            $table->integer('user_id')->nullable()->unsigned();
            $table->integer('category_id')->nullable()->unsigned();
            $table->integer('order_qty')->nullable()->unsigned();
            $table->float('coupon_discount')->nullable();
            $table->float('delivery_charge')->nullable();
            $table->integer('payment')->nullable();
            $table->float('total_amount_calculated')->nullable();
            $table->float('total_amount_payable')->nullable();
            $table->text('advisory_information')->nullable();
            $table->text('shipping_status')->nullable();
            $table->integer('delivered')->nullable()->unsigned();
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_details', function (Blueprint $table) {
            //
        });
    }
}
