@extends('layouts.app')


@section('content')
<h1>Show detail food</h1>
  <h3>Name: {{ $dish->name }}</h3>
  <h3>price: {{ $dish->price }}</h3>
  <h3>Description: {{ $dish->descri }}</h3>
  <h3>CategoryId: {{ $dish->category_id }}</h3>
  <h3>Category's name: {{ $dish->category->ca_name }}</h3>
@endsection
