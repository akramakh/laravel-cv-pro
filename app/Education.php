<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    //
    public $table = 'education';
    protected $fillable = ['user_id','provider','degree','start_date','end_date','more_info'];
    protected $dates = ['start_date', 'end_date'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
