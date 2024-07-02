<?php

namespace App\Http\Controllers;

use App\Models\ProductTable;
use App\Models\WishlistTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = ProductTable::with('detail_product', 'toko')->get();
        return view('product.index_product')->with('product', $product);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nama_product' => 'required|string|max:255',
        'jenis' => 'required|string|max:255',
        'harga' => 'required|numeric',
        'deposito' => 'required|numeric',
        'denda' => 'required|numeric',
        'deskripsi' => 'required|string',
        'kondisi' => 'required|string|max:255',
        'brand' => 'required|string|max:255',
    ]);

    $user = Auth::user();
    $toko = $user->toko;

    if (!$toko) {
        return redirect()->back()->with('error', 'User does not have a toko.');
    }

    $product = ProductTable::create([
        'nama_product' => $request->nama_product,
        'toko_id' => $toko->toko_id,
        'jenis' => $request->jenis,
    ]);

    $product->detail_product()->create([
        'harga' => $request->harga,
        'deposito' => $request->deposito,
        'denda' => $request->denda,
        'deskripsi' => $request->deskripsi,
        'kondisi' => $request->kondisi,
        'brand' => $request->brand,
    ]);

    return redirect()->route('index.product')->with('status', 'Product created successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = ProductTable::with('detail_product', 'ratings')->findOrFail($id);
         $wishlist = WishlistTable::firstOrCreate(['user_id' => Auth::id()]);

    return view('product.show_product')
        ->with('product', $product)
        ->with('wishlistId', $wishlist->wishlist_id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
