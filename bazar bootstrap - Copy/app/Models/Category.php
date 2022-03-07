<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    protected $table = 'categories';

    public function manyPosts()
    {
        return $this->belongsToMany(Post::class);
    }
    
    use HasFactory; 
}
