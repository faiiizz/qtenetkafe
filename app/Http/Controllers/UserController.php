<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {

        return view('users.index');

    }

    public function create() {

        return view('users.create');
    }

    public function store(Request $request)  {

        {
            // dd($request->all());
            $validatedData = $request->validate([
                'nama' => 'required',
                'email' => 'required',
                'avatar' => 'required',
                'no_hp' => 'required',
                'role' => 'required',
                'password' => 'required',
            ]);

            User::create($validatedData);
            return redirect('/listuser')->with('success', 'User Sukses ditambahkan');
        }
    }


    public function edit(User $user)
    {
        return view('listuser.edit', [
            'users' => $user::find($user->id)
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
                'nama' => 'required',
                'email' => 'required',
                'avatar' => 'required',
                'no_hp' => 'required',
                'role' => 'required',
                'password' => 'required',
        ]);

        User::where('id', $user->id)->update($validatedData);
        return redirect('/listuser')->with('success', 'User berhasil di Update');
    }

    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/listuser');
    }
}
