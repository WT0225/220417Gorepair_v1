<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Workshop extends Authenticatable

{
   protected $fillable = [
        'name',
        'email',
        'password',
        'tel',
        'address',
        'mon_open',
        'mon_close',
        'tue_open',
        'tue_close',
        'wed_open',
        'wed_close',
        'thu_open',
        'thu_close',
        'fri_open',
        'fri_close',
        'sat_open',
        'sat_close',
        'sun_open',
        'sun_close',
        'hol_open',
        'hol_close',
        'location',
        'lon',
        'lat',
        'diagnosis',
        'battery_replacement',
        'drive_recorder_attachment',
        'car_wash',
        'engine_alternater_replacement',
        'engine_oil_replacement',
        'engine_timing_belt_replacement',
        'engine_ignition_coil_replacement',
        'enigne_starter_replacement',
        'air_conditioner_filter_replacement',
        'air_conditioner_compressor_replacement',
        'tire_replacement',
        'tire_puncture_repair',
        'part',
    ];

   protected $hidden = [
       'password',
    ];
    
    
    // Sevicesテーブルとのリレーション （主テーブル側）
     public function services() {
        return $this->hasMany('App\Models\Service');
    }
    
    
     public function bookings() {
        return $this->hasMany('App\Models\Booking');
    }
    
}