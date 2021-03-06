<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['user_id', 'title', 'description', 'image'];

    protected $hidden = ['created_at', 'updated_at'];

    
}
