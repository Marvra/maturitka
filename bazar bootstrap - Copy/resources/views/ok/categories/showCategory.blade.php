@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center">
    <h1 class="fw-bold">{{ $categories->category_name }}</h1>
</div>

<div class="row">
    <div class="card col-md-4" style="width: 16rem;">
        <div class="card-header">
          Kategorie
        </div>
        <ul class="list-group list-group-flush">
          
         @foreach ($ok as $item)
            <li class="list-group-item"> <a href="/ok/categories/{{ $item->id }}">{{ $item->category_name }}</a></li>
        @endforeach 

        </ul>
      </div>

      <div class="col-md-9">
        @foreach ($cats->manyPosts as $manyPost)
                <div class="border mt-1">
                    @auth
                        @if ($manyPost->user_id == Auth::user()->id )
                            <a href="/ok/{{ $manyPost->id }}/edit"> Zmen </a>
                        @endif
                        @if ($manyPost->user_id == Auth::user()->id )
                            <form action="/ok/{{ $manyPost->id }}" method="POST">
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
                            <a href="/ok/{{ $manyPost->id }}"><img class="img-thumbnail" src="{{ asset('images/' . $manyPost->image_path)}}" alt="Card image cap"></a>
                        </div>
                        <div class="col-10 pt-2">
                            <div class="row">
                               <div class="col-8"> 
                                   <h2>{{$manyPost->name}}</h2>
                                   <div class="text-break lh-base">
                                    {{ $manyPost->description }}
                                 </div>
                                </div>
                               <div class="col-2"> <p class="fw-bold">{{$manyPost->price}} €</p></div>
                               <div class="col-2">  <p class="fw-bold">Lokalita</p> </div>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
      </div>
</div>


@endsection