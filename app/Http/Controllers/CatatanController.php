<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catatan;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;


class CatatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'catatan.index',
            [
                'catatans' => Catatan::paginate(6)
            ]
        );
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('catatan.create');
    }

    public function cetakcatat()
    {
        $catatans = Catatan::all();

        View()->share('catatans', $catatans);
        $pdf = PDF::loadView('catatan/catatan-pdf');
        return $pdf->download('Laporan Catatan.pdf');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'nama' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
        ]);

        Catatan::create($validatedData);
        return redirect('/catatan')->with('success', 'Create Successfully');
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
    public function edit(Catatan $catatan)
    {
        return view('catatan.edit', [
            'catatans' => $catatan::find($catatan->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Catatan $catatan)
    {
        $validatedData = $request->validate([
            'nama' => '',
            'tanggal' => '',
            'keterangan' => 'required',
        ]);

        Catatan::where('id', $catatan->id)->update($validatedData);
        return redirect('/catatan')->with('success', 'Data berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     // Catatan::destroy($id);
    //     // return redirect('./catatan')->with('hapus','Data Deleted Successfully');
    public function destroy(Catatan $catatan)
    {
        Catatan::destroy($catatan->id);
        return redirect('/catatan');
    }
}
