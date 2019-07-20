<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LanguageUser extends Model
{
    //
    Public $table = 'Language_user';
    protected $fillable = [
        'user_id',
        'language_id',
        'score'
    ];
}
