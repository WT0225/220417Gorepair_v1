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
        Schema::create('workshops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pw');
            $table->string('name', 50);
            $table->string('email', 50);
            $table->string('tel', 50);
            $table->string('address', 300);
            // $table->time('mon_open');
            // $table->time('mon_close');
            // $table->time('tue_open');
            // $table->time('tue_close');
            // $table->time('wed_open');
            // $table->time('wed_close');
            // $table->time('thu_open');
            // $table->time('thu_close');
            // $table->time('fri_open');
            // $table->time('fri_close');
            // $table->time('sat_open');
            // $table->time('sat_close');
            // $table->time('sun_open');
            // $table->time('sun_close');
            // $table->time('hol_open');
            // $table->time('hol_close');
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
        Schema::dropIfExists('workshops');
    }
};
