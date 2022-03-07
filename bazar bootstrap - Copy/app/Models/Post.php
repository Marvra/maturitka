<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'name',
        'description',
        'image_path',
        'price',
    ];

    public function manyCategories()
    {
        return $this->belongsToMany(Category::class);
    }
    

    use HasFactory;
}
