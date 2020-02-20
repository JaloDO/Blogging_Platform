<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLike extends Model
{
    protected $fillable = ['user','post'];
}
