<?php

namespace App\Http\Controllers\Product;

use App\Http\Requests\Product\StoreRequest;
use App\Models\Category;
use App\Models\Product;

class ProductController extends BaseController
{
    public function index(){
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create(){
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    public function store(StoreRequest $request){
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('product.index');
    }

    public function show(Product $product){
        return view('product.show', compact('product'));
    }
}
