@extends('layouts.app')

@section('content')
    
    <p><a href="/ok">zaznamy</a></p> 
    <br>

    <form action="/ok/{{ $post->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name:</label><br>
            <input type="text" name="name" value={{ $post->name }}><br>

            <label for="description">Description:</label><br>
            <input type="text" name="description" value={{ $post->description }}><br><br>

            <input type="submit" value="Submit">
        </div>
      </form> 
@endsection