<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IsAdmin extends Model
{
    //
    public $table = 'is_admins';
    protected $fillable = ['user_id'];

    public function user(){
        return $this->hasOne('App\User');
    }
}
