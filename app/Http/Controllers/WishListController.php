<?php

namespace App\Http\Controllers;

use App\Models\WishlistTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function index()
     {
         $wishlists = WishlistTable::with('products')->where('user_id', Auth::id())->get();

         return view('product.wishlist_product')->with('wishlists', $wishlists); // Menggunakan 'wishlists' bukan 'wishlist'
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
    public function addProductToWishlist(Request $request, $wishlistId)
    {
        $request->validate([
            'product_id' => 'required|exists:product,product_id',
        ]);

        $wishlist = WishlistTable::findOrFail($wishlistId);

        if (!$wishlist->products->contains($request->product_id)) {
            $wishlist->products()->attach($request->product_id);
        }

        return redirect()->back()->with('status', 'Product added to wishlist successfully.');
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
