<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; 

class Teams extends Model
{
    use HasFactory; 

    public function User(): HasMany{
        return $this->HasMany(User::class);
    }
    
}
