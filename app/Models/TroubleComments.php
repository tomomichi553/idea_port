<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class TroubleComments extends Model
{
    use HasFactory;
    use Notifiable;
    
    protected $fillable = [
        'comment',
        'trouble_id',
    ];
    
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function trouble():BelongsTo
    {
        return $this->belongsTo(Trouble::class);
    }
}
