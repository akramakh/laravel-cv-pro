<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable = ['user_id','provider','name','start_date','end_date','more_info'];
}
