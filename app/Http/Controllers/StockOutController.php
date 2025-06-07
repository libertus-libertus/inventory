<?php

namespace App\Http\Controllers;

use App\Models\{StockOut, Product, Customer};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class StockOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stockOuts = StockOut::with(['product', 'customer', 'user'])->latest()->get();
        $products = Product::latest()->get();

        return view('backend.stock_outs.index', compact('stockOuts', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $products = Product::all();
        $customers = Customer::all();

        $lastId = StockOut::latest()->first()?->id ?? 0;
        $nextId = $lastId + 1;
        $referenceCode = 'STKOUT-' . now()->format('Ymd') . '-' . str_pad($nextId, 3, '0', STR_PAD_LEFT);

        return view('backend.stock_outs.create', compact('products', 'customers', 'referenceCode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'reference_code' => 'required|unique:stock_outs,reference_code',
            'product_id'     => 'required|exists:products,id',
            'customer_id'    => 'required|exists:customers,id',
            'quantity'       => 'required|integer|min:1',
            'notes'          => 'nullable|string',
            'stock_out_date' => 'required|date',
        ]);

        $stockOut = StockOut::create([
            'reference_code'  => $validated['reference_code'],
            'product_id'      => $validated['product_id'],
            'customer_id'     => $validated['customer_id'],
            'user_id'         => Auth::id(),
            'quantity'        => $validated['quantity'],
            'notes'           => $validated['notes'],
            'stock_out_date'  => $validated['stock_out_date'],
        ]);

        $product = Product::find($validated['product_id']);
        $product->quantity -= $validated['quantity'];
        $product->save();

        return redirect()->route('stock_outs.index')->with('success', 'Transaksi penjualan barang berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $stockOut = StockOut::with(['product', 'customer', 'user'])->findOrFail($id);
        return view('backend.stock_outs.show', compact('stockOut'));
    }

    /**
     * Generate and download PDF invoice.
     */
    public function downloadPDF($id)
    {
        $stockOut = StockOut::with(['product', 'customer', 'user'])->findOrFail($id);
        $pdf = Pdf::loadView('backend.stock_outs.invoice', compact('stockOut'))
            ->setPaper([0, 0, 340, 850], 'portrait');

        return $pdf->download('struk-' . $stockOut->reference_code . '.pdf');
    }
}
