<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductSearch extends Component
{
    public $search = '';

    public function render()
    {
        $products = [];

        if (strlen($this->search) > 0) {
            $products = Product::where('productname', 'like', '%'.$this->search.'%')->get();
    }

    return view('livewire.product-search', compact('products'));
    }
}
