@extends('layouts.app')

@section('content')

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
                <div class="col-md-6 mb-3">
                  <label for="image" class="required" >Titulný obrázok</label><br>
                  <input type="file" name="image" class="form-control">
                  @error('image')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-6 mb-3">
                  <label for="multiple_image">Vedľajšie obrázky</label><br>
                  <input type="file" name="multiple_image[]" class="form-control" multiple>
                  @error('multiple_image')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
                <div class="row">
                  <div class="mb-3">
                    <label for="name" class="required">Názov</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Zadajte názov vášho inzerátu..." >
                    @error('name')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
      
                <div class="mb-3">
                      <label for="description" class="required" >Popisok</label><br>
                      <characters-remaining id="comment" label="Comment" value="{{ old('description') }}"></characters-remaining>
                      @error('description')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                  
                </div>
      
                <div class="row mb-3">
                  <div class="col-6">
                    <label for="location" class="required" >Mesto</label>
                    <input type="text" class="form-control" name="location" value="{{ old('location') }}" placeholder="Názov vášho mesta... ">
                    @error('location')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                  </div>
        
                  <div class="col-6">
                    <label for="price" class="required" >Cena</label>
                    <input type="text" class="form-control" name="price" value="{{ old('price') }}" placeholder="Cena produktu...">
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
                    <input type="text" class="form-control" name="contact" value="{{ old('contact') }}" placeholder="Vo formáte 09XXXXXXXX...">
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
</div>  
@endsection
