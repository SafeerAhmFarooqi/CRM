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
        Schema::create('service_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->string('service')->nullable();
            $table->string('serviceprice')->nullable();
            $table->string('servicediscount')->nullable();
            $table->boolean('servicediscounttype')->nullable();
            $table->string('sparepart')->nullable();
            $table->string('sparepartprice')->nullable();
            $table->string('sparepartnumber')->nullable();
            $table->string('sparepartdiscount')->nullable();
            $table->boolean('sparepartdiscounttype')->nullable();
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
        Schema::dropIfExists('service_information');
    }
};
