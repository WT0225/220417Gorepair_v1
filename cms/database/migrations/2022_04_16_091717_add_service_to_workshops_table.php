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
            $table->string('diagnosis');
            $table->string('battery_replacement');
            $table->string('drive_recorder_attachment');
            $table->string('car_wash');
            $table->string('engine_alternater_replacement');
            $table->string('engine_oil_replacement');
            $table->string('engine_timing_belt_replacement');
            $table->string('engine_ignition_coil_replacement');
            $table->string('enigne_starter_replacement');
            $table->string('air_conditioner_filter_replacement');
            $table->string('air_conditioner_compressor_replacement');
            $table->string('tire_replacement');
            $table->string('tire_puncture_repair');
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
            $table->dropColumn('diagnosis');
            $table->dropColumn('battery_replacement');
            $table->dropColumn('drive_recorder_attachment');
            $table->dropColumn('car_wash');
            $table->dropColumn('engine_alternater_replacement');
            $table->dropColumn('engine_oil_replacement');
            $table->dropColumn('engine_timing_belt_replacement');
            $table->dropColumn('engine_ignition_coil_replacement');
            $table->dropColumn('enigne_starter_replacement');
            $table->dropColumn('air_conditioner_filter_replacement');
            $table->dropColumn('air_conditioner_compressor_replacement');
            $table->dropColumn('tire_replacement');
            $table->dropColumn('tire_puncture_repair');
        });
    }
};
