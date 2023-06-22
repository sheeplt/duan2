@extends('layouts.app')


@section('content')
<h1>This is Dishes create</h1>

<form action="/dishes" method="POST"
      enctype="multipart/form-data">
      @csrf
      <input class="form-control" 
          type="file" name="image" 
        >
        <input class="form-control" 
          type="text" name="name" 
          placeholder="Enter dish's name">
        <input class="form-control" type="text" name="description" placeholder="Enter dish's description">
        <input class="form-control" type="text" name="price" placeholder="Enter dish's price">
        <div>
          <label>Choose a categories:</label>
          <select name="category_id">
            @foreach ($categories as $category)
              <option value="{{ $category->id }}">
                {{ $category->ca_name }}
              </option>    
            @endforeach                                
          </select>
      </div>
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
