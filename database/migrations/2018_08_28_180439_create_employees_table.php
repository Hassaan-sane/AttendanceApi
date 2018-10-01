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
            $table->increments('EmployeeId');
            $table->string('Name');
            $table->string('Username');
            $table->date('DOB');
            $table->string('Number');
            $table->string('UserId');
            $table->foreign('UserId')->references('id')->on('users');
            $table->integer('AdminId');
            $table->foreign('AdminId')->references('AdminId')->on('admins');
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
