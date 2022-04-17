<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    
     public function user() {
        return $this->belongsTo('App\Models\User');
    }
    
     // workshopテーブルとのリレーション
    public function workshop() {
        return $this->belongsTo('App\Models\Workshop');
    }
}
