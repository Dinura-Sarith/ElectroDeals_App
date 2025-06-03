<div>
    <input type="text" class="form-control mb-3" placeholder="Search Products..." wire:model="search">

    <div class="row">
        @foreach($products as $product)
            <div class="col-md-3">
                <div class="card mb-3">
                    <img src="{{ asset('images/' . $product->photo) }}" class="card-img-top" style="height: 150px; object-fit: contain;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->productname }}</h5>
                        <p class="card-text">${{ $product->price }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
