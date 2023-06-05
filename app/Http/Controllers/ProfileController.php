<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('profile.index');
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
    public function edit(User $user)
    {
        return view('profile.edit', [
            'users' => $user::find($user->user_id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => '',
            'avatar' => 'required|image|mimes:jpeg,png,jpg|max:5048',
            'no_hp' => 'required',
            'role' => '',
        ], [

            'nama.required' => 'Nama Barang Harus Diisi',
            'avatar.required' => 'Gambar Barang Harus Diisi',
            'no_hp.numeric' => 'Harus berupa angka',
            'avatar.image' => 'Foto Barang Harus Gambar',
            'avatar.mimes' => 'Foto Barang Harus Berformat jpeg,png,jpg,gif,svg',
            'avatar.max' => 'Foto Barang Maksimal 5MB',

        ]);

        $foto_avatar = $request->file('avatar');
        $foto_ekstensi = $foto_avatar->getClientOriginalExtension();
        $nama_foto = time() . '.' . $foto_ekstensi;
        $foto_avatar->move(public_path('avatars'), $nama_foto);
        $data_gambar = User::findOrfail($id);
        file::delete(public_path('avatar/' . $data_gambar->foto_avatar));

        $data = [
            'nama' => $request->nama,
            'avatar' => $nama_foto,
            'no_hp' => $request->no_hp
        ];
        User::where('id', $request->user_id)->update($data);
        return redirect('/profile')->with('success', 'Profile Sukses diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
