<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actives', function (Blueprint $table) {
            $table->biginteger('id');
            $table->primary('id');
            $table->string('name');
            $table->string('descrition');
            $table->float('value');
            $table->biginteger('type_active_id');
            $table->foreign('type_active_id')->references('id')->on('type_actives')->onUpdate('cascade')->onDelete('restrict');
            
            $table->biginteger('branch_office_id');
            $table->foreign('branch_office_id')->references('id')->on('branch_offices')->onUpdate('cascade')->onDelete('restrict');

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
        Schema::dropIfExists('actives');
    }
}
