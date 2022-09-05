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
        Schema::create('cost_estimates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->string('originalprice')->nullable();
            $table->string('repaircost')->nullable();
            $table->string('insurancenumber')->nullable();
            $table->string('customernumber')->nullable();
            $table->string('email')->nullable();
            $table->text('note')->nullable();
            $table->text('errordescription')->nullable();
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
        Schema::dropIfExists('cost_estimates');
    }
};
