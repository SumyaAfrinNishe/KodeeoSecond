<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branchlists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('contact');
            $table->string('email');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->integer('pincode');
            $table->string('country');
            $table->string('image');
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
        Schema::dropIfExists('branchlists');
    }
}
