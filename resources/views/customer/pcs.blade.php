@extends('layout2')

@section('title', 'PC')

@section('content')
<div class="container py-0">
    <div class="d-flex justify-content-between align-items-center mb-4 mt-2">
        <h2 class="fw-bold text-dark">Our PC Collection</h2>
        <div class="dropdown">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown">
                Sort By
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="?sort=price_asc">Price: Low to High</a></li>
                <li><a class="dropdown-item" href="?sort=price_desc">Price: High to Low</a></li>
                <li><a class="dropdown-item" href="?sort=name_asc">Name: A-Z</a></li>
            </ul>
        </div>
    </div>

    @if($products->isEmpty())
        <div class="alert alert-info text-center py-4">
            <i class="fas fa-laptop-alt fa-3x mb-3"></i>
            <h4>No PC's available at the moment</h4>
            <p class="mb-0">Check back later for new arrivals!</p>
        </div>
    @else
        <div class="row g-4">
            @foreach($products as $product)
            <div class="col-md-4 col-lg-3">
                <div class="card h-100 border-0 shadow-sm hover-shadow">
                    <div class="position-relative">
                        <img src="{{ $product->photo ? asset('images/'.$product->photo) : asset('images/placeholder-phone.png') }}" 
                             class="card-img-top p-3" 
                             alt="{{ $product->productname }}"
                             style="height: 200px; object-fit: contain;">
                    </div>
                    <div class="card-body pt-0">
                        <h5 class="card-title mb-1">{{ Str::limit($product->productname, 40) }}</h5>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="text-success fw-bold">${{ number_format($product->price, 2) }}</span>
                            <a href="{{ route('products-show', $product->id) }}" 
                               class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-eye me-1"></i> View
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($products->hasPages())
        <div class="d-flex justify-content-center mt-5">
            {{ $products->links() }}
        </div>
        @endif
    @endif
</div>
@endsection

@push('styles')
<style>
    .hover-shadow {
        transition: all 0.3s ease;
    }
    .hover-shadow:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    .card-img-top {
        background-color: #f8f9fa;
        mix-blend-mode: multiply;
    }
    
</style>
@endpush