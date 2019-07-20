<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    //
    public $table = 'social_media';
    protected $fillable = ['user_id', 'type', 'link'];
}
