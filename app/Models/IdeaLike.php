<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IdeaLike extends Model
{
    use HasFactory;
    
    protected $fillable = ['idea_id','user_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }
    
    
}
