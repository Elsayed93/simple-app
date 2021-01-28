@extends('products.master')

@php
$title = $product->name;
@endphp
@section('title', $title)

@section('content')
  <div class="container mt-5">
    <div class="row">
      <h1>
        {{ ucfirst($title) }}
      </h1>
    </div>
    <div class="row mt-5">
      <div class="col-sm-12 col-md-6">
        <img src="{{ asset('images/products/' . $product->image) }}" alt="" width="100%">
      </div>
      <div class="col-sm-12 col-md-6 ml-3">
        <h4>
          {{ $product->details }}
        </h4>
      </div>
    </div>



  </div>

@endsection
