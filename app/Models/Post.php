<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'media',
        'caption',
        'user_id',
    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function comments():HasMany {
        return $this->hasMany(Comment::class);
    }

    public function likes():HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function dislikes():HasMany
    {
        return $this->hasMany(Dislike::class);
    }

    public function report():HasMany{
        return $this->hasMany(Report::class);
    }
}
