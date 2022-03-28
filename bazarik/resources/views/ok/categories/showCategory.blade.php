@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center">
    <h1 class="fw-bold text-primary">{{ $categories->category_name }}</h1>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="card-deck col-md-3 border border-0" style="width: 16rem;">
            <div class="card-header bg-primary text-center fw-bold text-white">
              Kategorie
            </div>
            <ul class="list-group list-group-flush">
              @foreach ($ok as $item)
                <a class="text-white text-decoration-none  shadow" href="/ok/categories/{{ $item->id }}">
                    <li class="list-group-item bg-white border border-1 ">
                        <h6 class=" text-center mt-1 ">{{ $item->category_name }}</h6>
                    </li>
                </a>
              @endforeach
    
            </ul>
          </div>
    
          <div class="col-md-9 ms-4">
            @foreach ($cats->manyPosts->chunk(4) as $chunk)
                <div class="row g-0">
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
                              <h5 class="card-title">{{$post->name}}</h5>
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
                                  <div class="col-4 text-truncate">Lokalita:</div>
                                  <div class="col-8 d-flex justify-content-end fw-bold">{{ $post->location }} </div>
                                 </div>
                               </li>
                               <li class="list-group-item ">
                                <div class="row"> 
                                  <div class="col-5">Vytvorene:</div>
                                  <div class="col-7 d-flex justify-content-end fw-bold">{{ $post->created_at->format('d/m/Y') }}</div>
                                 </div>
                               </li>
                            </ul>
                              <a class="btn btn-primary" href="/ok/{{ $post->id }}">
                                <div class="card-body-no-padding"> 
                                  Pozri
                                </div>
                              </a>
                          </div>
                    @endforeach
                </div>    
            @endforeach
          </div>
    </div>
</div>

@endsection