<?php

namespace App\Http\Controllers;

use App\Models\OrderTable;
use App\Models\ProductTable;
use App\Models\RatingProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = OrderTable::with('product', 'product.toko', 'product.detail_product')
            ->where('user_id', Auth::id())
            ->get();

        return view('product.index_order')->with('orders', $orders);
    }

    public function showOrdersForOwnedProducts()
    {
        // Get the current authenticated user
        $user = Auth::user();
        // Get the toko owned by the current user
        $toko = $user->toko;
        // If the user doesn't own a toko, return an empty view or an error message
        if (!$toko) {
            return view('order.index_vendor_order')->with('orders', collect());
        }

        // Get the orders for the products owned by the toko
        $orders = OrderTable::whereIn('product_id', $toko->products->pluck('product_id'))->with('product', 'user')->get();

        return view('order.index_vendor_order')->with('orders', $orders);
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
        $request->validate([
            'product_id' => 'required|exists:product,product_id',
            'tanggal_mulai_sewa' => 'required|date',
            'tanggal_selesai_sewa' => 'required|date|after_or_equal:tanggal_mulai_sewa',
            'deskripsi' => 'nullable|string',
        ]);

        $product = ProductTable::findOrFail($request->product_id);
        $totalHarga = $this->calculateTotalPrice($product, $request->tanggal_mulai_sewa, $request->tanggal_selesai_sewa);

        OrderTable::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'deskripsi' => $request->deskripsi,
            'tanggal_mulai_sewa' => $request->tanggal_mulai_sewa,
            'tanggal_selesai_sewa' => $request->tanggal_selesai_sewa,
            'total_harga' => $totalHarga,
            'status' => 'pending',
        ]);

        return redirect()->route('index.product')->with('status', 'Product ordered successfully.');
    }

    private function calculateTotalPrice($product, $startDate, $endDate)
    {
        $days = (new \DateTime($endDate))->diff(new \DateTime($startDate))->days + 1;
        return $days * $product->detail_product->harga;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = OrderTable::with('product', 'user', 'product.toko.user', 'ratings')->findOrFail($id);
        return view('order.show_order')->with('order', $order);
    }

    public function showTenant($id)
    {
        $order = OrderTable::with('product', 'user', 'product.toko.user', 'ratings')->findOrFail($id);
        return view('order-tenant.show_order_tenant')->with('order', $order);
    }

    public function updateStatus(Request $request, $id)
    {
        $order = OrderTable::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->route('orders.show', $id)->with('success', 'Order status updated successfully.');
    }

    public function saveRating(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:10',
            'review' => 'nullable|string',
        ]);

        $order = OrderTable::findOrFail($id);

        RatingProductModel::create([
            'order_id' => $order->order_id,
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        return redirect()->back();
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
