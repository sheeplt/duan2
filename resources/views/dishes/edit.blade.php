@extends('layouts.app')


@section('content')
<h1>This is Dishes edit</h1>

<form action="/dishes/{{ $dish->id }}" method="post"
      enctype="multipart/form-data">
      @csrf
      @method('PUT')
        <input class="form-control" 
          type="text" name="name" value="{{ $dish->name }}"
          placeholder="Enter dish's name">
        <input class="form-control" type="text" value="{{ $dish->descri }}" name="description" placeholder="Enter dish's description">
        <input class="form-control" type="text" value="{{ $dish->price }}" name="price" placeholder="Enter dish's price">
        <div>
          <label>Choose a categories:</label>
          <select name="category_id">
            @foreach ($categories as $category)
              <option value="{{ $category->id }}"
              @if ($category->id == $dish->category_id)
                selected='selected'
              @endif>
                {{ $category->ca_name }}
              </option>    
            @endforeach                                
          </select>
        <button class="btn btn-primary" type="submit">
            Submit
        </button>
    </form>
    @if ($errors->any())
    <div>
      @foreach ($errors->all() as $error)
          <p class="text-danger">
            {{ $error }}
          </p>
      @endforeach
    </div>
    @endif
@endsection
