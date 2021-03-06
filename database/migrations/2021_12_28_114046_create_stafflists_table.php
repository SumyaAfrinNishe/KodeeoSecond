<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStafflistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stafflists', function (Blueprint $table) {
            $table->id();
            $table->string('staffname');
            $table->integer('staffcontact');
            $table->string('staffemail');
            $table->string('staffpassword');
            $table->integer('staffbranch_id');
            $table->string('staffimage');
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
        Schema::dropIfExists('stafflists');
    }
}
