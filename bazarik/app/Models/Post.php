<?php

namespace App\Models;

use App\Models\User;
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
        'location',
        'contact',
        'category_id',
    ];

    public function oneCategory()
    {
        return $this->belongsTo(Category::class);
    }

    public function userHas()
    {
        return $this->belongsTo(User::class);
    }

    public function manyImages()
    {
        return $this->hasMany(Image::class);
    }
    

    use HasFactory;
}
