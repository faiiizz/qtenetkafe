<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengambilan;
use App\Models\Inventory;


class PengambilanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'pengambilan.index',
            [
                'pengambilans' => Pengambilan::paginate(6),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $inv = Inventory::all();
        return view('pengambilan.create',compact('inv'))
        ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'inventory_id' => 'required|integer|exists:inventories,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal' => 'required',
            'keterangan' => 'nullable|string',
        ]);

        $inventory = Inventory::findOrFail($validate['inventory_id']);

        // validasi stok produk
        if ($inventory->stok < $validate['jumlah']) {
            return response()->json([
                'message' => 'Stok produk tidak mencukupi'
            ], 400);
        }

        // kurangi stok produk
        $inventory->stok -= $validate['jumlah'];
        $inventory->save();

        // simpan data transaksi
        // $pengambilan = new Pengambilan([
        //     'inventory_id' => $inventory->id,
        //     'jumlah' => $validate['jumlah'],
        //     'tanggal' => $validate['tanggal'],
        //     'keterangan' => $validate['keterangan'],
        // ]);

        // $pengambilan->save();

        Pengambilan::create($validate);
        return redirect('/pengambilan')->with('success', 'Pengambilan Sukses!!');
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
    public function edit(Pengambilan $pengambilan)
    {
        return view('pengambilan.edit', [
            'pengambilans' => $pengambilan::find($pengambilan->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengambilan $pengambilan)
    {
        $validatedData = $request->validate([
            'inventory_id' => '',
            'jumlah' => '',
            'tanggal' => '',
            'keterangan' => 'required',
        ]);

        Pengambilan::where('id', $pengambilan->id)->update($validatedData);
        return redirect('/pengambilan')->with('success', 'Data berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengambilan $pengambilan)
    {
        Pengambilan::destroy($pengambilan->id);
        return redirect('/pengambilan');
    }
}
