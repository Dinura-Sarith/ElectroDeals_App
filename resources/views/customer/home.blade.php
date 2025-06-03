@extends('layout2')

@section('title', 'Home')

@section('content')

<!-- Bootstrap 5 Carousel Slider -->
<div id="productCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
    <!-- Indicators -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="2"></button>
    </div>

    <!-- Slides -->
    <div class="carousel-inner rounded shadow" style="max-height: 500px;">
        <div class="carousel-item active">
            <img src="{{ asset('images/img1.jpg') }}" class="d-block w-100" alt="Electronics 1" style="object-fit: cover;">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/img2.png') }}" class="d-block w-100" alt="Electronics 2" style="object-fit: cover;">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/img3.jpg') }}" class="d-block w-100" alt="Electronics 3" style="object-fit: cover;">
        </div>
    </div>

    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<!-- Introduction Section -->
<div class="container text-center py-5">
    <h1 class="display-4 fw-bold mb-4">Welcome to ElectroDeals</h1>
    <p class="lead text-muted">
        Discover unbeatable prices on the latest electronics! Whether you're looking for the newest smartphones, reliable laptops, smart home devices, or entertainment systems – ElectroDeals has it all.
    </p>
    <p class="lead text-muted">
        Our platform offers a seamless shopping experience with trusted brands, lightning-fast delivery, and secure payments. Start exploring today and experience the future of electronics shopping.
    </p>
</div>

<!-- About Us Section -->
<div class="container py-5">
    <h2 class="text-center mb-4">About Us</h2>
    <div class="row align-items-center">
        <div class="col-md-6">
            <img src="{{ asset('images/img4.jpg') }}" class="img-fluid rounded shadow" alt="About Us">
        </div>
        <div class="col-md-6">
            <p class="lead text-muted">
                At ElectroDeals, we are passionate about providing the best in electronic products at prices you'll love. Founded with a mission to simplify technology shopping, we serve thousands of customers across the region with a curated selection of devices, accessories, and home electronics.
            </p>
            <p class="lead text-muted">
                Customer satisfaction is our top priority. From browsing to checkout and beyond, our goal is to make every step simple, transparent, and fast.
            </p>
        </div>
    </div>
</div>

<!-- Privileges Section -->
<div class="container py-5 bg-light rounded">
    <h2 class="text-center mb-4">Why Shop With Us?</h2>
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <i class="fas fa-shipping-fast fa-3x text-primary mb-3"></i>
            <h5 class="fw-bold">Fast & Reliable Delivery</h5>
            <p class="lead text-muted">We ship your orders quickly and safely, right to your doorstep.</p>
        </div>
        <div class="col-md-4 mb-4">
            <i class="fas fa-lock fa-3x text-primary mb-3"></i>
            <h5 class="fw-bold">Secure Payments</h5>
            <p class="lead text-muted">Your transactions are protected with the latest encryption standards.</p>
        </div>
        <div class="col-md-4 mb-4">
            <i class="fas fa-thumbs-up fa-3x text-primary mb-3"></i>
            <h5 class="fw-bold">Trusted Brands</h5>
            <p class="lead text-muted">We partner with the best manufacturers to bring you authentic products.</p>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .carousel {
        max-width: 1200px;
        margin: 0 auto;
    }
    .carousel-item {
        height: 500px;
        background-color: #f8f9fa;
    }
</style>
@endpush
