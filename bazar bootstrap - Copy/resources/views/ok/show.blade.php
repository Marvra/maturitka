@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-1 col-md-offset-1">
            /
        </div>
        <div class="col-md-4 col-md-offset-2">
            <img src="{{ asset('images/' . $post->image_path)}}" style="width: auto; height: 450px;" alt="Card image cap">
        </div>
        <div class="col-md-4">

            <h5 class="h1 text-primary">{{$post->name}}</h5>
            <p class="h4 mt-5 mb-4 fw-bold">{{$post->price}} €</p>

            <hr>

            <p class="h2" > Popis: {{$post->description}} </p>

            @foreach ($cats->manyCategories as $manyCategory)

            {{ $manyCategory->category_name }}
                
            @endforeach

            <a class="fw-bold" href="/auth/{{ $users->id }}">{{ $users->name }}</a>

        </div>
    </div>
@endsection