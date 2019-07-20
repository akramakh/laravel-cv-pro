<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillUser extends Model
{
    //
    Public $table = 'skill_user';
    protected $fillable = [
        'user_id',
        'skill_id',
        'score'
    ];
}
