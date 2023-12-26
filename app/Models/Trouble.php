<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trouble extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'body',    
    ];
    
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function tag():BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
        return $this->orderBy('updated_at','DESC')->paginate($limit_count);
    }
}
