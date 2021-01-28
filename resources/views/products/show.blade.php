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
      <div class="col-sm-12 col-md-5">
        <img src="{{ asset('images/products/' . $product->image) }}" alt="" width="100%">
      </div>
      <div class="col-sm-12 col-md-5">

        <div class="row">
          <h4>
            Details:
          </h4>
          <p>
            {{ $product->details }}
          </p>
        </div>

        <div class="row mt-5">
          <h4>
            Price:
          </h4>
          <p>
            {{ $product->details }}
          </p>
        </div>

      </div>
    </div>



  </div>

@endsection
