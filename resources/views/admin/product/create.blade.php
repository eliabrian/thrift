@extends('layouts.app')

@section('content')
<div class="d-flex mb-4">
    <div class="title p-2 me-auto">
        <h3>Product Page</h3>
    </div>

    <div class="p2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Product</a></li>
              <li class="breadcrumb-item active" aria-current="page">Create Product</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card col-10 m-auto">
    <div class="card-header">Create a Product</div>
    <div class="card-body">
        <form action="{{ route('admin.product.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <x-input type="text" name="name" id="name" label="Product Name"/>
                </div>
                <div class="col-lg-6">
                    <x-input type="text" name="color" id="color" label="Product Color"/>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-lg-6">
                    <label for="tag_id" class="form-label">Product Tag</label>
                    <select class="form-select" aria-label="Default select example" name="tag_id" id="tag_id">
                        @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>  
                    @error('tag_id')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror  
                </div>
                <div class="col-lg-6">
                    <label for="price" class="form-label">Product Price</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}"/>
                    </div>
                    @error('price')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-lg-6">
                    <x-input type="text" name="condition" id="condition" label="Product Condition"/>
                </div>
                <div class="col-lg-6">
                    <label for="discount" class="form-label">Discount</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="discount" name="discount" value="{{ old('discount') }}"/>
                        <span class="input-group-text">%</span>
                    </div>
                    @error('discount')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="1" id="sold" name="sold">
                <label class="form-check-label" for="sold">
                  Sold
                </label>
                @error('sold')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-secondary" href="{{ route('admin.product.index') }}">Cancel</a>
        </form>
    </div>
</div>
@endsection