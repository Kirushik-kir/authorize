@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="mb-4">
            <a class="btn btn-primary" href="{{route('product.create')}}" role="button">Add</a>
        </div>
        @foreach($products as $product)
            <div>
                <a href="{{route('product.show', $product->id)}}"> {{$product->id}}.  {{$product->name}}</a>
            </div>
        @endforeach
    </div>
@endsection
