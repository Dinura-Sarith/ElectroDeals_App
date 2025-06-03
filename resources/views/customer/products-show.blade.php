@extends('layout2')

@section('title', 'Product View')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-5">
            <img src="{{ asset('images/' . $product->photo) }}" class="img-fluid rounded shadow" alt="{{ $product->productname }}">
        </div>
        <div class="col-md-7">
            <h2 class="fw-bold mb-3">{{ $product->productname }}</h2>
            <p class="text-muted">{{ $product->description }}</p>
            <h4 class="text-success fw-bold">${{ number_format($product->price, 2) }}</h4>
            <p class="text-muted mt-2"><strong>Category:</strong> {{ $product->category->name ?? 'N/A' }}</p>
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary mt-3">Back to Mobiles</a>
        </div>
    </div>
</div>
@endsection
