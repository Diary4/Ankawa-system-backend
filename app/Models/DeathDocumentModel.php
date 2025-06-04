<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeathDocumentModel extends Model
{
    
    protected $fillable = [
        'gender',
        'death_location',
        'date_of_death',
        'religion',
        'religion',
        'nationality',
        'demander',
        'location',
        'related_to_death',
        'judge',
        'phone',
        'witness1_name',
        'witness2_name',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
