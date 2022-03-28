<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesPage extends Controller
{
    public function showCategory($id)
    {
        $categories = Category::find($id);

        $cats = Category::with('manyPosts')->find($id);

        $ok = Category::all();
      
        return view ('ok.categories.showCategory',[
            'categories' => $categories,
            'cats' => $cats,
            'ok' => $ok,
        ]);
    }
}
