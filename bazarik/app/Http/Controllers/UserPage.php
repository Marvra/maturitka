<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPage extends Controller
{
    public function showUser($id)
    {
        $user = User::find($id);
        
        $posts = $user->hasPosts;

        

        return view('ok.user.showUser', [
            'user'=>$user,
            'posts'=>$posts,
        ]);
    }
}
