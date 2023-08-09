<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Pemesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Cart;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fe.menufe.pemesan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            // dd($request->all());
            $validatedData = $request->validate([
                'kd_meja' => 'required',
                'nama_pemesan' => 'required',
            ]);

            Pemesanan::create($validatedData);
            return redirect('/checkout')->with('success', 'Silahkan melakukan pembayaran');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    // public function pesan(Request $request, $id)
    // {
    //     $menus = Menu::where('id', $id)->first();
    //     $tanggal = Carbon::now();

    //     //simpan pe
    // }

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
