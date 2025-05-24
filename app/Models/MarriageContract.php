<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarriageContract extends Model
{
    
    public function groom(){
        return $this->hasOne(Groom::class);
    }

    public function bride(){
        return $this->hasOne(Bride::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
