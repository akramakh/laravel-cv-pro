<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //
    protected $fillable = ['name'];

    public  function users(){
        return $this->belongsToMany('App\User');
    }

    public function rate($user_id){
        $rates = DB::select('select * from skill_rates where (skill_id = ? AND user_id = ?)',[$this->id, $user_id]);
        foreach($rates as $rate){
            return $rate->value;
        }
    }
}
