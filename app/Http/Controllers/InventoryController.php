<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use PDF;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view(
            'inventory.index',
            [
                'inventories' => Inventory::paginate(6)
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventory.create');
    }

    public function cetakinv()
    {
        $inventories = Inventory::all();

        View()->share('inventories', $inventories);
        $pdf = PDF::loadView('inventory/inventory-pdf');
        return $pdf->download('Laporan Inventory.pdf');

    //    $inventory = Inventory::select('*')
    //              ->get();

    //    $pdf = DomPDFPDF::loadView('cetak.cetakinv', ['inventory' => $inventory]);
    //    return $pdf->download('Laporan-Data-Inventory.pdf');
        //   $pdf = Pdf::loadView('cetak.cetakinv', $inventory);
        //   return $pdf->download('inventory.pdf');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            // dd($request->all());
            $validatedData = $request->validate([
                'kd_barang' => 'required',
                'nama_barang' => 'required',
                'stok' => 'required',
                'harga' => 'required',
                'satuan' => 'required',
            ]);

            Inventory::create($validatedData);
            return redirect('/inventory')->with('success', 'Inventory Sukses ditambahkan');
        }

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
    public function edit(Inventory $inventory)
    {
        return view('inventory.edit', [
            'inventories' => $inventory::find($inventory->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventory $inventory)
    {
        $validatedData = $request->validate([
            'kd_barang' => '',
            'nama_barang' => '',
            'stok' => 'required',
            'harga' => 'required',
            'satuan' => '',
        ]);

        Inventory::where('id', $inventory->id)->update($validatedData);
        return redirect('/inventory')->with('success', 'Data berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventory $inventory)
    {
        Inventory::destroy($inventory->id);
        return redirect('/inventory');
    }
}
