@extends('layouts.app')

@section('content')

    <form action="/ok/{{ $post->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row me-3 ms-2">
            <div class="col-4 py-5 ps-5">
              <h2>Ako napísať inzerát</h2>
              <p class="lead">Inzerát sa snažíme písať tak aby predal čo najviac informácií a bol stručný.</p>

              <p> Maximálna cena je: 999999€</p>
              <p> Telefónné číslo treba zadať vo formáte: 09XXXXXXXX</p>
            </div>
          <div class="col-8 ">
            <form action="/ok" method="POST" enctype="multipart/form-data">
              @csrf
               <div class="row">
                    <div class="col-10 ms-5">
                      <h4 class="mb-3">Inzerát</h4>
                        <div class="row">
                          <div class="mb-3">
                            <label for="name" class="required">Meno</label>
                            <input type="text" class="form-control" name="name" value="{{ $post->name}}" placeholder="" >
                            @error('description')
                              <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
              
                        <div class="mb-3">
                              <label for="description" class="required" >Popisok</label><br>
                              <textarea class="border" rows="8" type="text"  name="description" style="width: 810px"   placeholder="Popis svoj produkt...">{{ $post->description}}</textarea>
                              @error('description')
                                  <div class="text-danger">{{ $message }}</div>
                              @enderror
                          
                        </div>
              
                        <div class="row mb-3">
                          <div class="col-6">
                            <label for="location" class="required" >Mesto</label>
                            <input type="text" class="form-control" name="location" value="{{ $post->location}}" placeholder="Názov vášho mesta... ">
                            @error('location')
                            <div class="text-danger">{{ $message }}</div>
                          @enderror
                          </div>
                
                          <div class="col-6">
                            <label for="price" class="required" >Cena</label>
                            <input type="text" class="form-control" name="price" value="{{ $post->price}}" placeholder="Cena produktu...">
                            @error('price')
                              <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4 mb-3">
                            <label for="id" class="required" >Kategórie</label>
                            <select class="form-select d-block w-100" name="id"> 
                              @foreach ($categories as $category)
                                <option name="id" value="{{ $category->id}}">{{ $category->category_name}}</option>
                              @endforeach
                            </select>
                            @error('id')
                              <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-md-8 mb-3">
                            <label for="contact" class="required" >Tel.č.</label>
                            <input type="text" class="form-control" name="contact" value="{{ $post->contact}}" placeholder="Vo formáte 09XXXXXXXX...">
                            @error('contact')
                              <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                        <hr class="mb-4">
                        <input type="submit" class="btn btn-primary btn-lg mb-4" value="Submit">
                      </div>
                    </div>
                  </div>
            </form>
          </div>
        </div>   -->   
      </form> 
@endsection