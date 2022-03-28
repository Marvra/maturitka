<?php

namespace App\Http\Controllers;

use File;
use App\Models\Post;
use App\Models\User;
use App\Models\Image;
use App\Models\Category;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(12);
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
        $message = [
            "multiple_image.max" => "Maximálny počet obrázkov sú 3."
         ];

       $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:1000',
            'price' => 'required|integer|max:999999',
            'contact' => 'required|string|unique:posts|regex:/(09)[0-9]{8}/',
            'location' => 'required|string|max:30',
            'image' => 'required|mimes:jpg,png,jpeg|max:2048',
            'id' => 'required',
            'multiple_image.*' => 'mimes:jpg,jpeg,png|max:2048',
            'multiple_image' => 'max:3',
            ],$message);
   
        $renameImage = time() . '-' . $request->name . '-' . $request->image->extension();
        
        $request->image->move(public_path('images'), $renameImage);

       $post = $request->user()->hasPosts()->create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price'=> $request->input('price'),
            'category_id' => $request->input('id'),
            'location' => $request->input('location'),
            'contact' => $request->input('contact'),
            'image_path' => $renameImage,
        ]);

        $help = 0;

        if($request->hasFile('multiple_image'))
        {
            $images = $request->file('multiple_image');
            foreach($images as $image)
            {
                $renameImages = time() . '-' . $help++ . '-' . $request->name;
                $image->move('images',$renameImages);
                $post->manyImages()->create(['path'=>$renameImages]);
            }
        }
        
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
        $post = Post::find($id);

        $images = Image::with('hasPost')->where('post_id',$id)->get();

        $users = User::where('id',$post->user_id)->firstOrFail();
        //dostat meno pouzivatela komu patri zobrazeny post pouzit ho ako link na jeho stranku
        
        return view ('ok.show',[
            'post' => $post,
            'users' => $users,
            'images' => $images,
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');

        $categories = Category::all();

        $posts = Post::where('name', 'like', '%'.$search.'%')->paginate(12);
        
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
        $categories=Category::all();

        $post=Post::find($id);

        return view('ok.edit', [
            'post'=>$post,
            'categories'=>$categories,
        ]);
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
            'price' => $request->input('price'),
            'category_id' => $request->input('id')
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
         
        $images = Image::with('hasPost')->where('post_id',$id)->get();

        foreach($images as $image)
        {
            $multipleDelete = public_path() . "/images/" . $image->path;
            unlink($multipleDelete);
        }

        $post->delete();
        

        return redirect('/ok');
    }
}
