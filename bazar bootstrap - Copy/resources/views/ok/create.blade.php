@extends('layouts.app')

@section('content')

    <form action="/ok" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="d-flex align-items-center flex-column">
            <label for="image">Image:</label><br>
            <input type="file" name="image">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <br>

            <label for="name">Name:</label><br>
            <input type="text" name="name" class="border">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <br>

            <label for="description">Popisok:</label><br>
            <characters-remaining id="comment" label="Comment"></characters-remaining>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <br>

            
            <label for="price">Cena:</label><br>
            <input type="text" name="price" class="border">
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <br>
            
           <form>
            <div class="d-flex justify-content-center">
                <p>Category:</p>
                    @foreach ($categories as $category)
                        <label for="id">{{ $category->category_name}}</label>
                        <input type="checkbox" name="id[]" value="{{ $category->id}}">
                    @endforeach
                    <br>
            </div>

            <input type="submit" class="btn btn-primary btn-lg" value="Submit">
        </div>
      </form>
   

@endsection