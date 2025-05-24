<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groom extends Model
{
    //
    public function marriageContract()
    {
        return $this->belongsTo(MarriageContract::class);
    }
}
