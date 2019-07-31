<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->biginteger('id');
            $table->primary('id');
            $table->string('name');
            $table->string('description');
            $table->float('price_cost');
            $table->biginteger('color_id');
            $table->foreign('color_id')->references('id')->on('colors')->onUpdate('cascade')->onDelete('restrict');
            $table->biginteger('type_product_id');
            $table->foreign('type_product_id')->references('id')->on('type_products')->onUpdate('cascade')->onDelete('restrict');
            $table->biginteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onUpdate('cascade')->onDelete('restrict');
            $table->biginteger('size_id');
            $table->foreign('size_id')->references('id')->on('sizes')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('products');
    }
}
