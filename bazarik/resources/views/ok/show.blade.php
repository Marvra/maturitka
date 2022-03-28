@extends('layouts.app')

@section('content')

    <div class="row me-3 ms-2">
        <div class="col-md-2 col-md-offset-2">
            @foreach ($images as $image)
               <div class="d-flex justify-content-center pb-4">
                    <a href="{{ asset('images/' . $image->path)}}" target="_blank" >
                        <img class="img-side-post" src="{{ asset('images/' . $image->path)}}" alt="Card image cap">
                    </a>
                </div>
            @endforeach
        </div>
        <div class="col-md-4 col-md-offset-2">
            <a href="{{ asset('images/' . $post->image_path)}}" target="_blank">
                <img class="img-main-post" src="{{ asset('images/' . $post->image_path)}}" alt="Card image cap">
            </a>
        </div>
        <div class="col-md-6 bg-white pt-3 ">
            <h5 class="h1 text-primary">{{$post->name}}</h5>
            <p class="h4 mt-2 mb-4 fw-bold">{{$post->price}} €</p>

            <hr>

            <p class="h2" > Popis:</p>
            <p>
                {{ $post->description }}
            </p>

            <p class="h3 mt-5" > Kontakt:</p>
            <p>
                {{ $post->contact }}
            </p>

            <p class="h3" > Lokalita:</p>
            <p>
                {{ $post->location }}
            </p>
            <hr>

            
            <div class="row mb-4">
                <div class="col-6 d-flex justify-content-end">
                    <img src="{{ asset('images/profile/' .  $users->profile_pic) }}" width="80" height="80" class="rounded-circle border">
                </div>
                <div class="col-6 mt-4">
                    <a class="fw-bold h4" href="/ok/user/{{ $users->id }}">{{ $users->name }}</a>
                </div>
            </div>

        </div>
    </div>
@endsection