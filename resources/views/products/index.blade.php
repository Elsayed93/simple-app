@extends('products.master')

@php
$title = 'all products';
@endphp
@section('title', "{$title}")

@section('content')
  <div class="container mt-5">
    <div class="row">
      <h1>
        {{ ucfirst($title) }}
      </h1>
    </div>

    <div class="row">
      @foreach ($products as $product)
        <div class="col-sm-12 mt-3 col-md-6 mt-3 col-lg-4 mt-3">


          <div class="card shadow-sm">
            <img class="bd-placeholder-img card-img-top" width="100%" height="225"
              src="{{ asset('images/products/' . $product->image) }}" role="img" aria-label="Placeholder: Thumbnail"
              preserveAspectRatio="xMidYMid slice" focusable="false">
            <div class="card-body">
              <h5 class="card-title ml-2">{{ $product->name }}</h5>
              <p class="card-text">{{ $product->price }}</p>
              <p class="card-text">{{ \Illuminate\Support\Str::limit($product->details, 50, $end = '...') }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
      @endforeach

    </div>
  </div>



  {{-- {{ $products->links() }} --}}
@endsection
