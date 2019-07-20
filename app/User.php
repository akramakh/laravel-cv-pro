<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
    ];

    protected $dates = ['created_at', 'update'];

    public function isAdmin(){
        // return $this->belongsTo('App\IsAdmin');
        return DB::select('select * from isadmin where user_id = ?',[$this->id]);
        // $d = DB::select('select * from isadmin where user_id = ?',[$this->id]);
        // if($d)
        //     return true;
        // else
        //     return false;
    }

    public function info(){
        return $this->hasOne('App\PersonalInfo');
    }

    public function skills(){
        return $this->belongsToMany('App\Skill')->withPivot('id','score','created_at');
    }

    public function languages(){
        return $this->belongsToMany('App\Language')->withPivot('id','score','created_at');
    }

    public function workExperiences(){
        return $this->hasMany('App\WorkExperience');
    }

    public function educations(){
        return $this->hasMany('App\Education');
    }


    public function courses(){
        return $this->hasMany('App\Course');
    }

    public function interests(){
        return $this->hasMany('App\Interest');
    }

    public function socialMedias(){
        return $this->hasMany('App\SocialMedia');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
