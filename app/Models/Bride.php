<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bride extends Model
{
    //
    protected $fillable = [
        'name',
        'occupation',
        'religion',
        'location',
        'address',
        'dob',
        'nationality',
        'marital_status',
        'marriage_contract_id', // foreign key
    ];
    public function marriageContract()
    {
        return $this->belongsTo(MarriageContract::class);
    }
}
