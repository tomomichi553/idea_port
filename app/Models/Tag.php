<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tag extends Model
{
    use HasFactory;
    
    public function troubles():HasMany
    {
        return $this->hasMany(Trouble::class);
    }
    
    public function ideas():HasMany
    {
        return $this->hasMany(Idea::class);
    }
    
}
