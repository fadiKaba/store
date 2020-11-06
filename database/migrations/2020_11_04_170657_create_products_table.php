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
            $table->bigIncrements('product_id');
            $table->string('product_name', 45);
            $table->string('product_img', 150)->nullable();
            $table->decimal('product_price', 10, 2);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('company_id');
            $table->integer('product_trending')->default(0);
            $table->integer('product_availability')->default(1);
            $table->integer('product_quantity')->default(10);
            $table->text('product_description')->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('category_id')->on('categories');
            $table->foreign('company_id')->references('company_id')->on('companies');
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
