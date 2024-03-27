@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{route('product.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="user_id" class="form-label">user_id</label>
                <input value="{{old('user_id')}}" type="number" name="user_id" class="form-control" id="user_id"
                       placeholder="your id">
                @error('user_id')
                <p class="text-danger">Заполните это поле</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input value="{{old('name')}}" type="text" name="name" class="form-control" id="name"
                       placeholder="name">
                @error('name')
                <p class="text-danger">Заполните это поле</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <textarea type="text" name="description" class="form-control" id="description"
                          placeholder="description">{{old('description')}}</textarea>
                @error('description')
                <p class="text-danger">Заполните это поле</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">category_id</label>
                <select class="form-select" aria-label="Default select example" id="category_id" name="category_id">
                    @foreach($categories as $category)
                        <option
                            {{old('category_id') == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <p class="text-danger">Выберите категорию</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="qr_code" class="form-label">qr_code</label>
                <input value="{{old('qr_code')}}" type="number" name="qr_code" class="form-control" id="qr_code"
                       placeholder="qr_code">
                @error('qr_code')
                <p class="text-danger">Заполните это поле</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">image</label>
                <input value="{{old('image')}}" type="text" name="image" class="form-control" id="image"
                       placeholder="image">
                @error('image')
                <p class="text-danger">Заполните это поле</p>
                @enderror
            </div>
            <div class="mb-5">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
        <div>
            <a class="btn btn-primary" href="{{route('product.index')}}" role="button">Back</a>
        </div>
    </div>
@endsection
