<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('AdminId');
            $table->string('Name');
            $table->string('Username');
            $table->date('DOB');
            $table->string('Number');
            $table->string('OrgCodeId');
            $table->string('UserId');
            $table->foreign('OrgCodeId')->references('CodeId')->on('org_codes');
            $table->foreign('UserId')->references('id')->on('users');
            $table->integer('TotalEmployee');
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
        Schema::dropIfExists('admins');
    }
}
