<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_bills', function (Blueprint $table) {
            $table->biginteger('id');
            $table->primary('id');
            $table->biginteger('quantity');
            $table->float('subtotal');
            $table->biginteger('product_inventory_id');
            $table->foreign('product_inventory_id')->references('id')->on('product_inventories')->onUpdate('cascade')->onDelete('restrict');
            $table->biginteger('bill_id');
            $table->foreign('bill_id')->references('id')->on('bills')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('detail_bills');
    }
}
