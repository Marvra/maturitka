<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'path',
        'post_id',
    ];


    public function hasPost()
    {
        return $this->belongsTo(Post::class);
    }

    use HasFactory;
}
