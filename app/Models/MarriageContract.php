<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarriageContract extends Model
{
    protected $fillable = [
        'type',
        'judge_name',
        'phone',
        'marriage_date',
        'witness1_name',
        'witness2_name',
        'marray_peshaki',
        'marray_pashaki',
        'peshaki_wargirawa',
        'pashaki_wargirawa',
        'tayfa',
        'kanisa',
        'number_of_childs',
        'user_id'
    ];

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
