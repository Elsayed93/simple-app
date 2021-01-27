@extends('products.master')

@php
$product = 'product';
$title = 'create products';
@endphp
@section('title', " {$title}")

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
          <input name="{{ $input }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="product {{ $input }}">
          <br>
        </div>
        <div class="form-group">
          @php $input = 'price'; @endphp
          <label for="exampleInputPassword1">{{ $input }}</label>
          <input type="text" name="{{ $input }}" class="form-control" id="exampleInputPassword1"
            placeholder="{{ $input }}">
        </div>
        <br>
        <div class="form-group">
          @php $input = 'details'; @endphp
          <label for="exampleInputPassword1">{{ $input }}</label><br>
          <textarea name="{{ $input }}" id="exampleInputPassword1" style="width: 100%" rows="7"
            placeholder="{{ $input }}"></textarea>
          <br>
          <br>
        </div>

        <div class="form-group">
          @php $input = 'image'; @endphp
          <label for="exampleInputPassword1">{{ $input }}</label>
          <input type="file" name="image" class="form-control" id="exampleInputPassword1" placeholder="{{ $input }}">
          <br>
        </div>
        <button type="submit" class="btn btn-primary">Add {{ ucfirst($product) }}</button>
      </form>

    </div>
  </div>
@endsection
