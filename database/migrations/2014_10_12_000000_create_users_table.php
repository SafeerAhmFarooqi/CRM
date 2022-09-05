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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('shopname')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('subdomain')->unique()->nullable();
            $table->boolean('status')->default(0);
            $table->string('profile_pic')->nullable();
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->string('taxnumber')->nullable();
            $table->string('fax')->nullable();
            $table->string('street')->nullable();
            $table->string('house_number')->nullable();
            $table->string('postalcode')->nullable();
            $table->string('location')->nullable();
            $table->string('address')->nullable();
            $table->string('companysite')->nullable();
            $table->string('shop_url')->nullable();
            $table->string('logo')->nullable();
            $table->string('colorsetting')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
