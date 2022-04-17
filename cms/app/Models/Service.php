<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    
    // userテーブルとのリレーション
    public function workshop() {
        return $this->belongsTo('App\Models\Workshop');
    }
}
