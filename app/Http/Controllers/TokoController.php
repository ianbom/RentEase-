<?php

namespace App\Http\Controllers;

use App\Models\TokoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $toko = TokoModel::with('user')->get();
        return view('toko.index_toko')
        ->with('toko',$toko);
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view('toko.create_toko');
    // }

    public function create_toko(){
        return view('toko.create_toko');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat_toko' => 'required|string',
        ]);

        $user_id = Auth::id();

        TokoModel::create([
            'user_id' => $user_id,
            'nama_toko' => $request->nama_toko,
            'deskripsi' => $request->deskripsi,
            'alamat_toko' => $request->alamat_toko,
        ]);

        return redirect()->route('index.toko')->with('status', 'Toko created successfully.');
    }



    public function show(string $id)
    {
        $toko = TokoModel::with('user')->findOrFail($id);
        return view('toko.show_toko')->with('toko', $toko);
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
