@extends('products.master')

@php
$productName = 'product';
$title = 'edit products';
@endphp
@section('title', $title)

@section('content')
  <div class="container my-5">
    <div class="row col-md-6 mx-auto">

      <h1>
        {{ ucfirst($title) }}
      </h1>

      {{-- message after update a product --}}
      @if (session()->has('updatedMessage'))
        <div class="alert alert-success" role="alert">{{ session()->get('updatedMessage') }}</div>
      @endif

      <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
          @php $input = 'name'; @endphp
          <label for="exampleInputEmail1">product {{ $input }}</label>
          <input name="{{ $input }}" type="text" class="form-control @error($input) is-invalid @enderror"
            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="product {{ $input }}"
            value="{{ $product->name }}">

          @error($input)
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
          <br>
        </div>

        <div class="form-group">
          @php $input = 'price'; @endphp
          <label for="exampleInputPassword1">{{ $input }}</label>
          <input type="text" name="{{ $input }}" class="form-control @error($input) is-invalid @enderror"
            id="exampleInputPassword1" placeholder="{{ $input }}" value="{{ $product->price }}">

          @error($input)
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror

        </div>
        <br>


        <div class="form-group">
          @php $input = 'details'; @endphp
          <label for="exampleInputPassword1">{{ $input }}</label><br>
          <textarea class="@error($input) is-invalid @enderror" name="{{ $input }}" id="exampleInputPassword1"
            style="width: 100%" rows="7" placeholder="{{ $input }}">{{ $product->details }}</textarea>
          @error($input)
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
          <br>
          <br>
        </div>

        <div class="form-group">
          @php $input = 'image'; @endphp
          <label for="exampleInputPassword1">{{ $input }}</label>
          <input type="file" name="{{ $input }}" class="form-control @error($input) is-invalid @enderror"
            id="exampleInputPassword1" placeholder="{{ $input }}" value="{{ $product->image }}">
          @error($input)
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror

          <br>
        </div>
        <button type="submit" class="btn btn-primary">Update {{ ucfirst($productName) }}</button>
      </form>

    </div>
  </div>
@endsection
