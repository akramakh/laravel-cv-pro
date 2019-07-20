<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    //
    protected $fillable = ['user_id','company','role','start_date','end_date','more_info'];
    protected $dates = ['start_date', 'end_date'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
