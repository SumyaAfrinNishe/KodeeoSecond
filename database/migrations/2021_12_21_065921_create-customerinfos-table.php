<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customerinfos', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('recepient_name');
            $table->string('recepient_email');
            $table->integer('recepient_phone');
            $table->integer('from_branch_name_id');
            $table->integer('to_branch_name_id');
            $table->string('type_of_shipment');
            $table->string('courier_description');
            $table->integer('quantity');
            $table->integer('weight');
            $table->string('delitype');
            $table->string('cus_image');
            $table->bigInteger('track_number')->nullable();
            $table->string('customer_decision')->default('Pending');
            $table->string('status')->default('Pending');
            $table->integer('price')->nullable();
            $table->date('pickup_date')->nullable();
            $table->time('pickup_time')->nullable();
            $table->string('payment')->default('Pending');
            $table->string('transid')->default('Pending');
            $table->string('delievery')->default('Pending');
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
        // Schema::dropIfExists('customerinfos');
    }
}
