<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function __construct()
    {
        \Illuminate\Support\Facades\DB::getDoctrineSchemaManager()
           ->getDatabasePlatform()->registerDoctrineTypeMapping('point', 'string');
    }
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('workshops', function (Blueprint $table) {
            $table->renameColumn('pw', 'password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->time('mon_open');
            $table->time('mon_close');
            $table->time('tue_open');
            $table->time('tue_close');
            $table->time('wed_open');
            $table->time('wed_close');
            $table->time('thu_open');
            $table->time('thu_close');
            $table->time('fri_open');
            $table->time('fri_close');
            $table->time('sat_open');
            $table->time('sat_close');
            $table->time('sun_open');
            $table->time('sun_close');
            $table->time('hol_open');
            $table->time('hol_close');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('workshops', function (Blueprint $table) {
            //
        });
    }
};
