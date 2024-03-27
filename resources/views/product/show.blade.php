@extends('layouts.app')
@section('content')
    <div>
        {{$product->name}}
    </div>
    <a href="{{route('product.index')}}">Back</a>
@endsection
