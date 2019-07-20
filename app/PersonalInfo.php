<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    //
    protected $fillable = [
        'user_id','jop_title', 'phone_number', 'address', 'personal_photo',
    ];

    public  function user(){
        return $this->belongsTo('App\User');
    }
}
