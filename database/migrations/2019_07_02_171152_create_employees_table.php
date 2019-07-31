<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->biginteger('id');
            $table->primary('id');
            $table->string('name');
            $table->string('surname');
            $table->string('user');
            $table->float('salary', 8,2);
            $table->string('password');
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
        Schema::dropIfExists('employees');
    }
}
