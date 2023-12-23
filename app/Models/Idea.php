<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Idea extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'idea_title',
        'idea_background',
        'idea_goal',
        'idea_detail',
        //'tag_id',
    ];
    
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function tag():BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }
}
    

