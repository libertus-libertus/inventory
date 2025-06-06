<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function stocks()
    {
        $products = Product::with(['category', 'supplier'])->latest()->get();
        return view('backend.stocks.index', compact('products'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['category', 'supplier'])->latest()->get();
        return view('backend.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        $sku = $this->generateSKU();

        return view('backend.products.create', compact('categories', 'suppliers', 'sku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'unit' => 'nullable|string|max:50',
            'quantity' => 'required|integer|min:0',
            'status' => 'required|in:tersedia,tidak tersedia',
            'supplier_id' => 'nullable|exists:suppliers,id',
        ]);

        $validated['sku'] = $this->generateSKU(); // Set SKU secara otomatis

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Generate SKU otomatis dengan format PRD-0001, PRD-0002, dst.
     */
    private function generateSKU()
    {
        $latestProduct = Product::latest('id')->first();
        $nextId = $latestProduct ? $latestProduct->id + 1 : 1;

        return 'PRD-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('backend.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('backend.products.edit', compact('product', 'categories', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'unit' => 'nullable|string|max:50',
            'quantity' => 'required|integer|min:0',
            'status' => 'required|in:tersedia,tidak tersedia',
            'supplier_id' => 'nullable|exists:suppliers,id',
        ]);

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
