@extends('layout2')

@section('title', 'Edit Product')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Edit Product</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="border p-4 rounded shadow-sm bg-light">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="productname" class="form-label">Product Name</label>
            <input type="text" name="productname" class="form-control" value="{{ old('productname', $product->productname) }}" required>
        </div>

        <div class="mb-3">
            <label for="cat_id" class="form-label">Category</label>
            <select name="cat_id" class="form-select" required>
                <option value="">-- Select Category --</option>
                @foreach ($categories as $id => $name)
                    <option value="{{ $id }}" {{ $product->cat_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Product Image (optional)</label><br>
            @if ($product->photo)
                <img src="{{ asset('images/' . $product->photo) }}" alt="Current Image" width="120" class="mb-2 rounded">
            @endif
            <input type="file" name="photo" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
        <a href="{{ route('product.index2') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
