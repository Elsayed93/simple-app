@extends('products.master')

@php
$productName = 'product';
$title = 'create products';
@endphp

@section('title', $title)

@section('content')
  <div class="container my-5">
    <div class="row col-md-6 mx-auto">

      <h1>
        {{ ucfirst($title) }}
      </h1>

      @if (session()->has('updateMessage'))
        <div class="alert alert-success" role="alert">{{ session()->get('updateMessage') }}</div>
      @endif

      <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          @php $input = 'name'; @endphp
          <label for="exampleInputEmail1">product {{ $input }}</label>
          <input name="{{ $input }}" type="text" class="form-control @error($input) is-invalid @enderror"
            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="product {{ $input }}"
            value="{{ old($input) }}">

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
            id="exampleInputPassword1" placeholder="{{ $input }}" value="{{ old($input) }}">

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
            style="width: 100%" rows="7" placeholder="{{ $input }}">{{ old($input) }}</textarea>
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
            id="exampleInputPassword1" placeholder="{{ $input }}" value="{{ old($input) }}">
          @error($input)
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror

          <br>
        </div>
        <button type="submit" class="btn btn-primary">Add {{ ucfirst($product) }}</button>
      </form>

    </div>
  </div>
@endsection
