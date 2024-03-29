@extends('layouts.app')
@php
use App\Http\Resources\User\UserResource
@endphp
@section('content')
    <div>
        @foreach($data as $key => $val)
        @endforeach
    </div>
@endsection
