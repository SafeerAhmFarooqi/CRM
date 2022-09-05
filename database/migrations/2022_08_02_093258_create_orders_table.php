<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('status')->nullable();
            $table->string('statuscode')->nullable();
            $table->string('manufacturer')->nullable();
            $table->string('model')->nullable();
            $table->string('imei')->nullable();
            $table->string('serialno')->nullable();
            $table->string('devicepassword')->nullable();
            $table->string('storage')->nullable();
            $table->string('color')->nullable();
            $table->string('offer')->nullable();
            $table->string('condition')->nullable();
            $table->string('problem')->nullable();
            $table->text('comment')->nullable();
            $table->string('duration')->nullable();
            $table->string('time')->nullable();
            $table->string('pricedefault')->nullable();
            $table->string('warehouseno')->nullable();
            $table->string('approval')->nullable();
            $table->string('paymentmethod')->nullable();
            $table->timestamp('starttime')->nullable();
            $table->timestamp('endtime')->nullable();
            $table->string('technician')->nullable();
            $table->text('techniciannote')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
