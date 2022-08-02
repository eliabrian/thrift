<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProductResource;
use App\Http\Resources\Product as ProductCollection;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index ()
    {
        return ProductResource::collection(
            Product::with('tag')
                ->paginate()
        )->response();
    }

    public function show(Product $product)
    {
        return new ProductResource(
            Product::with('tag')
                ->where('id', $product->id)
                ->first()
        );
    }
}
