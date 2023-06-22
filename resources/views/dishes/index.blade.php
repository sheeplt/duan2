@extends('layouts.app')


@section('content')
<h1>This is Dishes index</h1>
<a href="dishes/create" 
    class="btn btn-primary"
    role="button">
      Create a new Dishes
  </a>
@foreach ($dishes as $dish)
    <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto">
        <div class="fw-bold">
          <a href="/dishes/{{ $dish->id }}">
            {{-- Like "show details" --}}
            <h3>{{ $dish->name }}</h3>
          </a>      
        </div>
        <h3>{{ $dish->descri }}</h3>
        </div>
        <span class="badge bg-primary rounded-pill">
            <h3>{{ $dish->price }}</h3>
        </span>
        <a href="/dishes/{{ $dish->id }}/edit">
            Edit
        </a>
        {{-- Delete a food --}}
        <form action="/dishes/{{ $dish->id }}" method="post">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger">
            Delete
          </button>
        </form>
      </li>          
@endforeach

<img src="{{ asset('storage/com-trang.jpg') }}" width="100" height="100" alt="">
@endsection
