<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Idea extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'idea_title',
        'idea_background',
        'idea_goal',
        'idea_detail',
        'img_url',
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
    
    public function idea_comments():HasMany
    {
        return $this->hasMany(IdeaComments::class);
    }
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
        return $this->orderBy('updated_at','DESC')->paginate($limit_count);
    }
    
    public function ByLimit(int $limit_count = 9)
    {
        return $this->orderBy('updated_at','DESC')->limit($limit_count)->get();;
    }
    
    public function idea_likes()
    {
        return $this->hasMany(IdeaLike::class);
    }
    
    public function isIdeaLikedBy($user): bool 
    {
        return IdeaLike::where('user_id', $user->id)->where('idea_id', $this->id)->first() !==null;
    }
    
}
    

