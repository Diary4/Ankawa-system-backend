<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DistrbutionDocument extends Model
{
    protected $table = 'distribution_document';

    protected $fillable = [
        'user_id',
        'the_late_name',
        'farmanga',
        'date_of_death',
        'location',
        'demander',
        'page',
        'record',
        'judge',
        'phone',
        'witness1_name',
        'witness2_name',
        'details'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
