<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class IdeaComments extends Model
{
    use HasFactory;
    use Notifiable;
    
    protected $fillable = [
        'comment',
        'idea_id'
    ];
    
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function idea():BelongsTo
    {
        return $this->belongsTo(Idea::class);
    }
    
}
