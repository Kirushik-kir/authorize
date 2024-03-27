@extends('layouts.app')
@section('content')
    <div>
        @foreach($users as $user)
            <div>
                {{$user->id}}. {{$user->name}}:
                <div>
                    @foreach($user->products as $product)
                        <div>{{$product->name}}</div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection
