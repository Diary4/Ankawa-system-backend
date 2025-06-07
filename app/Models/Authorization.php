<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Authorization extends Model
{
    protected $fillable = [
        'user_id',
        'demander',
        'location',
        'patient_name',
        'disease_type', 
        'judge',
        'phone',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
