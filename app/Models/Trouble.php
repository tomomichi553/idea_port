<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trouble extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'body', 
        'img_url',
    ];
    
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function tag():BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }
    
    public function trouble_comments():HasMany
    {
        return $this->hasMany(TroubleComments::class);
    }
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
        return $this->orderBy('updated_at','DESC')->paginate($limit_count);
    }
    
    public function ByLimit(int $limit_count = 9)
    {
        return $this->orderBy('updated_at','DESC')->limit($limit_count)->get();;
    }
    
    public function trouble_likes()
    {
        return $this->hasMany(TroubleLike::class);
    }
    
    
    public function isTroubleLikedBy($user): bool 
    {
        return TroubleLike::where('user_id', $user->id)->where('trouble_id', $this->id)->first() !==null;
    }
}
