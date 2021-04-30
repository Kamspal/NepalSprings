<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('product_name')->nullable();
            $table->string('product_code')->nullable();
            $table->string('product_tags')->nullable();
            $table->string('product_color')->nullable();
            $table->text('description')->nullable();
            $table->float('regular_price')->nullable();
            $table->float('sale_price')->nullable();
            $table->string('product_image')->nullable();
             $table->json('featured_image1')->nullable();
            $table->json('featured_image2')->nullable();
            $table->json('featured_image3')->nullable();
            $table->boolean('in_out_stock')->nullable();
            $table->double('available_quantity')->nullable();
            $table->text('ingredients')->nullable();
            $table->text('advisory_information')->nullable();
            $table->text('remember_to')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('h1')->nullable();
            $table->text('h2')->nullable();
            $table->text('h3')->nullable();
            $table->timestamps();

         $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
