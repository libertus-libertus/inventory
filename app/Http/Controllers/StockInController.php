<?php

namespace App\Http\Controllers;

use App\Models\{Product, StockIn, Supplier, Category};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class StockInController extends Controller
{
    public function index()
    {
        // $stockIns = StockIn::with(['product', 'supplier', 'user'])->latest()->get();
        // return view('backend.stock_ins.index', compact('stockIns'));

        $stockIns = StockIn::with(['product', 'supplier', 'user'])->latest()->get();
        $products = Product::latest()->get(); // <--- tambahkan ini

        return view('backend.stock_ins.index', compact('stockIns', 'products'));
    }

    // public function create()
    // {
    //     $suppliers = Supplier::all();
    //     $categories = Category::all();
    //     return view('backend.stock_ins.create', compact('suppliers', 'categories'));
    // }


    public function downloadPDF($id)
    {
        $stockIn = StockIn::with(['product', 'supplier'])->findOrFail($id);
        // $pdf = Pdf::loadView('backend.stock_ins.invoice', compact('stockIn'));
        // $pdf = Pdf::loadView('backend.stock_ins.invoice', compact('stockIn'))
        //   ->setPaper([0, 0, 226.77, 600], 'portrait');
        $pdf = Pdf::loadView('backend.stock_ins.invoice', compact('stockIn'))
            ->setPaper([0, 0, 340, 850], 'portrait');
        //   ->setPaper([0, 0, 283.46, 708.66], 'portrait'); // 100mm x 250mm, 1mm ~ 2.8346pt
        return $pdf->download('struk-' . $stockIn->reference_code . '.pdf');
    }

    public function show($id)
    {
        $stockIn = StockIn::with(['product', 'supplier', 'user'])->findOrFail($id);
        return view('backend.stock_ins.show', compact('stockIn'));
    }

    public function create()
    {
        // Ambil data produk dan supplier untuk dropdown
        $products = Product::all();
        $suppliers = Supplier::all();

        // Buat kode referensi otomatis, misalnya STKIN-20250606-001
        $lastId = StockIn::latest()->first()?->id ?? 0;
        $nextId = $lastId + 1;
        $referenceCode = 'STKIN-' . now()->format('Ymd') . '-' . str_pad($nextId, 3, '0', STR_PAD_LEFT);

        return view('backend.stock_ins.create', compact('products', 'suppliers', 'referenceCode'));
    }

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'sku' => 'required|string',
    //         'name' => 'required|string',
    //         'description' => 'nullable|string',
    //         'unit' => 'required|string',
    //         'category_id' => 'required|exists:categories,id',
    //         'supplier_id' => 'required|exists:suppliers,id',
    //         'quantity' => 'required|integer|min:1',
    //         'notes' => 'nullable|string',
    //         'stock_in_date' => 'required|date',
    //     ]);

    //     // Cari produk berdasarkan SKU
    //     $product = Product::where('sku', $validated['sku'])->first();

    //     if (!$product) {
    //         // Produk belum ada, buat baru
    //         $product = Product::create([
    //             'name' => $validated['name'],
    //             'sku' => $validated['sku'],
    //             'description' => $validated['description'],
    //             'category_id' => $validated['category_id'],
    //             'unit' => $validated['unit'],
    //             'quantity' => 0,
    //             'status' => 'active',
    //             'supplier_id' => $validated['supplier_id'],
    //         ]);
    //     }

    //     // Tambah stok
    //     $product->increment('quantity', $validated['quantity']);

    //     // Simpan ke tabel stock_in
    //     StockIn::create([
    //         'reference_code' => 'IN-' . strtoupper(Str::random(8)),
    //         'user_id' => Auth::id(),
    //         'supplier_id' => $validated['supplier_id'],
    //         'product_id' => $product->id,
    //         'quantity' => $validated['quantity'],
    //         'notes' => $validated['notes'],
    //         'stock_in_date' => $validated['stock_in_date'],
    //     ]);

    //     return redirect()->route('stock-ins.index')->with('success', 'Transaksi barang masuk berhasil.');
    // }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'reference_code' => 'required|unique:stock_ins,reference_code',
            'product_id'     => 'required|exists:products,id',
            'supplier_id'    => 'required|exists:suppliers,id',
            'quantity'       => 'required|integer|min:1',
            'notes'          => 'nullable|string',
        ]);

        $stockIn = StockIn::create([
            'reference_code' => $validated['reference_code'],
            'product_id'     => $validated['product_id'],
            'supplier_id'    => $validated['supplier_id'],
            // 'user_id'        => auth()->id(),
            'user_id'        => Auth::id(),
            'quantity'       => $validated['quantity'],
            'notes'          => $validated['notes'],
            'stock_in_date'  => now(),
        ]);

        // Tambah stok ke produk
        $product = Product::find($validated['product_id']);
        $product->quantity += $validated['quantity'];
        $product->save();

        return redirect()->route('stock_ins.index')->with('success', 'Transaksi barang masuk berhasil disimpan.');
    }
}