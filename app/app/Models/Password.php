<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Password extends Model
{


    protected $casts = [
        'site',
        'login',
        'password' => 'encrypted',
        'user_id'
    ];

    protected $fillable = ['site', 'login', 'password', 'user_id'];


    
}
