@extends('layouts.app')

@section('content')
    <div class="me-3 ms-3">
        <div class="d-flex justify-content-center bg-white fw-bold text-primary pb-4 pt-4 border-top border-bottom">
            <h1 class="fw-bold">
                {{ $user->name }}
            </h1>
        </div>
        <h2 class="text-center mt-3 pb-4 pt-4 bg-white text-primary border-top border-bottom mb-5">
            Inzeráty uživateľa
        </h2>
    </div>
    @foreach ($posts->chunk(5) as $chunk)
                <div class="row g-0 d-flex justify-content-center">
                    @foreach ($chunk as  $post)
                        <!--<div class="mb-4 col-md-4">
                            <div class="mt-1 bg-white card">
                                <div class="card-header bg-primary" style="--bs-bg-opacity: .75;">
                                    <div class="row text-white">
                                    <div class="col-8"> 
                                        <h2 class="mt-0">{{$post->name}}</h2>
                                        </div>
                                    <div class="col-2"> <p class="fw-bold mt-2">{{$post->price}} €</p></div>
                                    <div class="col-2">  <p class="fw-bold mt-2">Lokalita</p> </div>
                                    </div>
                                </div>
                            <div class="row" style="height: 175px">
                                    <div class="col-2 mb-1">
                                        <a href="/ok/{{ $post->id }}"><img class="img-thumbnail border border-0 ms-2" src="{{ asset('images/' . $post->image_path)}}" alt="Card image cap"></a>
                                    </div>
                                    <div class="col-10 text-break lh-base">
                                        <p class="me-2 mt-2">{{ $post->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>-->

                        <div class="card mb-4 me-4 border border-0 shadow" style="width: 250px;">
                            <img class="card-img-top" style="height: 200px; object-fit: cover;" src="{{ asset('images/' . $post->image_path)}}" alt="Card image cap">
                            <div class="card-body">
                              <h5 class="card-title text-truncate">{{$post->name}}</h5>
                              <p class="card-text text-truncate">{{ $post->description }}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item ">
                               <div class="row"> 
                                 <div class="col-3">Cena:</div>
                                 <div class="col-9 d-flex justify-content-end fw-bold">{{ $post->price }} €</div>
                                </div>
                              </li>
                              <li class="list-group-item">
                                <div class="row"> 
                                  <div class="col-4">Lokalita:</div>
                                  <div class="col-8 d-flex justify-content-end fw-bold">{{ $post->location }} </div>
                                 </div>
                               </li>
                               <li class="list-group-item ">
                                <div class="row"> 
                                  <div class="col-5">Vytvorene:</div>
                                  <div class="col-7 d-flex justify-content-end fw-bold">{{ $post->created_at->format('d/m/Y') }}</div>
                                 </div>
                               </li>
                               <li class="list-group-item">
                                @auth
                                    @if ($post->user_id == Auth::user()->id )
                                        <button class="btn btn-primary me-2">
                                            <a href="/ok/{{ $post->id }}/edit" class="text-white text-decoration-none">
                                                Upraviť 
                                            </a>
                                        </button>
                                    @endif
                                    @if ($post->user_id == Auth::user()->id )
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $post->id }}">
                                            Zmazať inzerát
                                        </button>
                                        
                                        <div class="modal fade" id="exampleModal{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Zmazanie inzerátu</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                Ste si istý, že chete tento inzerát zmazať?
                                                </div>
                                                    <div class="d-flex justify-content-end mb-2 me-2">
                                                        <form action="/ok/{{ $post->id }}" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <div>
                                                                <button type="submit" class="btn btn-primary">Zmaz</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    @endif
                                @endauth
                              </li>
                            </ul>
                            @auth
                                @if ($post->user_id != Auth::user()->id )
                                <a class="btn btn-primary" href="/ok/{{ $post->id }}">
                                    <div class="card-body-no-padding"> 
                                    Pozri
                                    </div>
                                </a>
                                @endif
                            @endauth
                            @guest
                                <a class="btn btn-primary" href="/ok/{{ $post->id }}">
                                    <div class="card-body-no-padding"> 
                                    Pozri
                                    </div>
                                </a>
                            @endguest
                        </div>
                    @endforeach
                </div>    
            @endforeach
        @endsection