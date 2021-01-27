@extends('products.master')

@php
$title = $product->name;
@endphp
@section('title', "{$title}")

@section('content')
  <div class="container mt-5">
    <div class="row">
      <h1>
        {{ ucfirst($title) }}
      </h1>
    </div>
    <strong>id: </strong> {{ $product->id }} <br>
    <strong>name: </strong> {{ $product->name }} <br>
    <strong>price: </strong>{{ $product->price }} <br>
    <strong>details: </strong> {{ $product->details }} <br>

    <br>
    <a href="{{ route('products.edit', $product->id) }}">Edit</a>
    <a href="{{ route('products.destroy', $product->id) }}">Delete</a>



  </div>

@endsection
