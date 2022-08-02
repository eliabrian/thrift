<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    public function index()
    {
        // $this->authorize('viewAny', Product::class);

        $products = Product::with('tag')->get();

        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $this->authorize('create', Product::class);

        $tags = Tag::all();

        return view('admin.product.create', compact('tags'));
    }

    public function store(StoreProductRequest $request)
    {
        $this->authorize('create', Product::class);

        $validated = $request->validated();

        $created = Product::create($validated);
        
        if ($created) {
            return redirect(route('admin.product.index'))
                ->with('message', 'Product create successfully');
        }
    }

    public function edit(Product $product)
    {
        $this->authorize('view', $product);

        $tags = Tag::all();

        return view('admin.product.edit', compact('product', 'tags'));
    }

    public function update(StoreProductRequest $request, Product $product)
    {
        $this->authorize('update', $product);

        $validated = $request->validated();

        $updated = Product::where('id', $product->id)
            ->update($validated);

        if ($updated) {
            return redirect(route('admin.product.index'))
                ->with('message', 'Product updated successfully');
        }
    }

    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);
        
        $deleted = $product->delete();

        if ($deleted) {
            return redirect(route('admin.product.index'))
                ->with('message', 'Product deleted successfully');
        }
    }
}
