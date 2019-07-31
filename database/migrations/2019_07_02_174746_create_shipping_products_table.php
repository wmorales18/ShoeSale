<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_products', function (Blueprint $table) {
            $table->biginteger('id');
            $table->primary('id');
            $table->biginteger('quantity');
            $table->biginteger('type_shipping_id');
            $table->foreign('type_shipping_id')->references('id')->on('type_shippings')->onUpdate('cascade')->onDelete('restrict');
            $table->biginteger('shipping_id');
            $table->foreign('shipping_id')->references('id')->on('shippings')->onUpdate('cascade')->onDelete('restrict');
             $table->biginteger('product_inventory_id');
            $table->foreign('product_inventory_id')->references('id')->on('product_inventories')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('shipping_products');
    }
}
