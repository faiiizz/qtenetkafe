<?php

namespace App\Http\Controllers;

use App\Models\Datpes;
use Illuminate\Http\Request;

class DatpesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datpesans = Datpes::with('menu');
        return view(
            'datpesan.index',
            [
                'datpesans' => $datpesans->all()
            ]
        );
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
{
    $validatedData = $request->validate([
        'nama_pemesan' => 'required|string|max:255',
        'no_meja' => 'required|integer|min:1',
        'nama_pesanan' => 'required|string|max:255',
        'jumlah' => 'required|integer|min:1',
        'harga' => 'required|numeric|min:0',
        'status' => '',
    ]);

    $order = new Datpes();
    $order->nama_pemesan = $validatedData['nama_pemesan'];
    $order->no_meja = $validatedData['no_meja'];
    $order->nama_pesanan = $validatedData['nama_pesanan'];
    $order->jumlah = $validatedData['jumlah'];
    $order->harga = $validatedData['harga'];
    $order->save();

    return redirect('/pembayaran')->with('success', 'Silahkan melakukan Pembayaran.');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
