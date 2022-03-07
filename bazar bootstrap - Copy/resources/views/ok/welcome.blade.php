@extends('layouts.app')

@section('content')

<div class="row">
    <div class="card col-md-4" style="width: 16rem;">
        <div class="card-header">
          Kategorie
        </div>
        <ul class="list-group list-group-flush">
          
          @foreach ($categories as $category)
            <li class="list-group-item"> <a href="/ok/categories/{{ $category->id }}">{{ $category->category_name }}</a></li>
          @endforeach

        </ul>
      </div>

      <div class="col-md-9">
        @foreach ($posts as $post)
                <div class="border mt-1">
                    @auth
                        @if ($post->user_id == Auth::user()->id )
                            <a href="/ok/{{ $post->id }}/edit"> Zmen </a>
                        @endif
                        @if ($post->user_id == Auth::user()->id )
                            <form action="/ok/{{ $post->id }}" method="POST">
                                @csrf
                                @method('delete')
                                <div>
                                    <button type="submit">Zmaz</button>
                                </div>
                            </form>
                        @endif
                    @endauth
                    <div class="row">
                        <div class="col-2">
                            <a href="/ok/{{ $post->id }}"><img class="img-thumbnail" src="{{ asset('images/' . $post->image_path)}}" alt="Card image cap"></a>
                        </div>
                        <div class="col-10 pt-2">
                            <div class="row">
                               <div class="col-8"> 
                                   <h2>{{$post->name}}</h2>
                                   <div class="text-truncate lh-base">
                                       {{ $post->description }}
                                    </div>
                                </div>
                               <div class="col-2"> <p class="fw-bold">{{$post->price}} €</p></div>
                               <div class="col-2">  <p class="fw-bold">Lokalita</p> </div>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
      </div>
</div>
@endsection