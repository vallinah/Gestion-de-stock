<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Filters\ProductFilter;

class ProductController extends Controller
{
    public function index(Request $request, ProductFilter $filter)
{
    $products = $filter->apply(
        Product::query(),
        $request->all()
    )->latest()->get();

    return Inertia::render('Products/Index', [
        'products' => $products,
        'filters' => $request->all()
    ]);
}

    public function create()
    {
        return Inertia::render('Products/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric'
        ]);

        Product::create($request->all());

        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        return Inertia::render('Products/Edit', [
            'product' => $product,
            'history' => $product->priceHistories()->latest()->get()
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric'
        ]);

        $product->update($request->all());

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }
}