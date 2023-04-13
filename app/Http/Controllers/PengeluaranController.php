<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Models\Inventory;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'pengeluaran.index',
            [
                'pengeluarans' => Pengeluaran::paginate(6),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $inv = Inventory::all();
        return view('pengeluaran.create',compact('inv'))
        ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'pengeluaran' => 'required',
            'tanggal' => 'required',
            'inventory_id' => 'required|integer|exists:inventories,id',
            'jumlah' => 'required',
            'rincian' => 'nullable|string',
        ]);

        $inventory = Inventory::findOrFail($validate['inventory_id']);

        //  menambah stok produk
        $inventory->stok += $validate['jumlah'];
        $inventory->save();

        // simpan data transaksi
        // $pengambilan = new Pengambilan([
        //     'inventory_id' => $inventory->id,
        //     'jumlah' => $validate['jumlah'],
        //     'tanggal' => $validate['tanggal'],
        //     'keterangan' => $validate['keterangan'],
        // ]);

        // $pengambilan->save();

        Pengeluaran::create($validate);
        return redirect('/pengeluaran')->with('success', 'Pengeluaran Sukses!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengeluaran $pengeluaran)
    {
        return view('pengeluaran.edit', [
            'pengeluarans' => $pengeluaran::find($pengeluaran->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $validatedData = $request->validate([
            'pengeluaran' => '',
            'tanggal' => '',
            'inventory_id' => '',
            'jumlah' => '',
            'rincian' => 'required',
        ]);

        Pengeluaran::where('id', $pengeluaran->id)->update($validatedData);
        return redirect('/pengeluaran')->with('success', 'Data berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengeluaran $pengeluaran)
    {
        Pengeluaran::destroy($pengeluaran->id);
        return redirect('/pengeluaran');
    }
}
