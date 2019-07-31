<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pays', function (Blueprint $table) {
            $table->biginteger('id');
            $table->primary('id');
            $table->float ('total');
            $table->biginteger('type_pay_id');
            $table->foreign('type_pay_id')->references('id')->on('type_pays')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('detail_pays');
    }
}
