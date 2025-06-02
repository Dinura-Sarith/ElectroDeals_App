@extends('layout')
@section('content')

<div class="container">
    <h3 class="text-center">Products</h3>
    <br>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-area">
                <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Product Name</label>
                            <input type="text" class="form-control" name="productname" required>
                        </div>

                        <div class="col-md-6">
                            <label>Category</label>
                            <select name="cat_id" class="form-control" required>
                                <option value="">Select a category</option>
                                @foreach($categories as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label>Description</label>
                            <input type="text" class="form-control" name="description">
                        </div>

                        <div class="col-md-6">
                            <label>Price</label>
                            <input type="number" class="form-control" name="price" step="0.01" required>
                        </div>

                        <div class="col-md-6">
                            <label>Image</label>
                            <input class="form-control" name="photo" type="file">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Product Table -->
            <table class="table mt-5 table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($products as $key => $product)
                    <tr>
                        <td scope="col">{{ ++$key }}</td>
                        <td scope="col">{{ $product->productname }}</td>
                        <td scope="col">{{ $product->category->name}}</td>
                        <td scope="col">{{ $product->description }}</td>
                        <td scope="col">{{ $product->price}}</td>
                        <td scope="col">
                            @if($product->photo)
                                <img src="{{ asset('images/' . $product->photo) }}" alt="Product Image" width="100">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-primary mb-1">
                                <i class="fa fa-pencil"></i> Edit
                            </a>

                            <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>    
</div>

@push('css')
<style>
    .form-area {
        background-color: #f8f9fa;
        padding: 20px;
        margin-top: 20px;
        border-radius: 5px;
    }
</style>
@endpush

@endsection
