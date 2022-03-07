<?php

namespace App\Http\Controllers;

use File;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $categories = Category::all();
 
        return view('ok.welcome', [
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view ('ok.create',[
            'categories' => $categories,
        ]);


    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //-------------------------error zadaj vo view
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|integer',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
            'id' => 'required',
        ]);
        //-------------------------error zadaj vo view
   

        $renameImage = time() . '-' . $request->name . '-' . $request->image->extension();

        $request->image->move(public_path('images'), $renameImage);

        $post = $request->user()->hasPosts()->create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price'=> $request->input('price'),
            'image_path' => $renameImage,
        ]);

        $post->manyCategories()->attach($request->input('id'));

        /*$post = Post::create([
            $request -> user(),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image_path' => $renameImage,
        ]);*/


        return redirect('/ok'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::find($id);

        $cats = Post::with('manyCategories')->find($id);

        $users = User::where('id',$posts->user_id)->firstOrFail();
        //dostat meno pouzivatela komu patri zobrazeny post pouzit ho ako link na jeho stranku

        return view ('ok.show',[
            'post' => $posts,
            'cats' => $cats,
            'users' => $users,
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');

        $categories = Category::all();

        $posts = Post::where('name', 'like', '%'.$search.'%')->get();
        
       //dd($search , $posts);

        return view('ok.welcome', [
            'posts'=>$posts,
            'categories'=>$categories,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id)->first();

        return view('ok.edit')->with('post' , $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::where('id' , $id)->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            //'price' => $request->input('price'),
            //'id' => $request->input('id')
        ]);

        return redirect('/ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $imageDelete = public_path() . "/images/" . $post->image_path;

        unlink($imageDelete);

        $post->delete();

        return redirect('/ok');
    }
}
