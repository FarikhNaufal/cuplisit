<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    
    protected $guarded = [];

    public function post():BelongsTo{
        return $this->belongsTo(Post::class);
    }
}
