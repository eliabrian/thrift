@extends('layouts.app')

@section('content')
<div class="d-flex mb-4">
    <div class="title p-2 me-auto">
        <h3>Product Page</h3>
    </div>

    <div class="p2">
        <a href="{{ route('admin.product.create') }}" class="btn btn-primary">Add Product</a>
    </div>
</div>

@if (session('message'))    
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('message') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<table id="example" class="table table-hover table-bordered" style="width:100%">
    <thead class="table-dark">
        <tr>
            <th>Name</th>
            <th>Color</th>
            <th>Tag</th>
            <th>Price (Rupiah)</th>
            <th>Discount (Percent)</th>
            <th>Condition</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->color }}</td>
            <td>{{ $product->tag->name }}</td>
            <td>Rp {{ number_format($product->price, 0, ",", ".") }}</td>
            <td>{{ $product->discount }} %</td>
            <td>{{ $product->condition }}</td>
            <td>
                <a href="{{ route('admin.product.edit', $product->id) }}">Edit</a>
                <a href="#" role="button" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
            </td>
        </tr>

        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this product?
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="{{ route('admin.product.destroy', $product->id) }} " method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </tbody>
    
</table>
@endsection