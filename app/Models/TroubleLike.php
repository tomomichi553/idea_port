<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TroubleLike extends Model
{
    use HasFactory;
    
    protected $fillable = ['trouble_id','user_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function trouble()
    {
        return $this->belongsTo(Trouble::class);
    }
    
}
