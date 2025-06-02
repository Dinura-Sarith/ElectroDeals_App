<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    protected $products;

    public function __construct(){
        $this->products = new Product();
    }

    public function index()
    {
        $products = $this->products->all();
        $categories = Category::pluck('name', 'id');

        return view('pages.product.index2', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'productname' => 'required',
            'cat_id' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $fileName = time() . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('images'), $fileName);
            $validatedData['photo'] = $fileName;
        }

        Product::create($validatedData);

        return redirect()->back()->with('success', 'Product added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = $this->products->findOrFail($id);
        $categories = Category::pluck('name', 'id');

        return view('pages.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = $this->products->findOrFail($id);

        $validatedData = $request->validate([
            'productname' => 'required',
            'cat_id' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($product->photo && file_exists(public_path('images/' . $product->photo))) {
                unlink(public_path('images/' . $product->photo));
            }

            $fileName = time() . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('images'), $fileName);
            $validatedData['photo'] = $fileName;
        }

        $product->update($validatedData);

        return redirect()->route('product.index2')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = $this->products->findOrFail($id);

        if ($product->photo && file_exists(public_path('images/' . $product->photo))) {
            unlink(public_path('images/' . $product->photo));
        }

        $product->delete();

        return redirect()->route('product.index2')->with('success', 'Product deleted successfully.');
    }

    public function showMobiles()
    {
        $sort = request()->input('sort');

        $query = Product::with('category')
            ->whereHas('category', function($query) {
                $query->where('name', 'Smart Phones');
            })
            ->select('id', 'productname', 'price', 'photo', 'description', 'created_at');

        switch ($sort) {
            case 'price_asc':
                $query->orderBy('price');
                break;
            case 'price_desc':
                $query->orderByDesc('price');
                break;
            case 'name_asc':
                $query->orderBy('productname');
                break;
            default:
                $query->latest();
        }

        $products = $query->paginate(12);

        return view('customer.mobiles', compact('products'));
    }
}
