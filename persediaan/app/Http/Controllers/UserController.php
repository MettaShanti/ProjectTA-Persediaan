<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   public function index()
    {
        //panggil model supplier
        $result = User::all();
        //dd($result); untuk menampilkan data db

        // kirim data $result ke view User/index.blade.php
        return view('user.index')->with('user', $result);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'role'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'role'     => $request->role,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // edit data
        $User = User::find($id);
        return view('user.edit')->with('user', $User);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $User)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $User->id,
        ]);

        $data = [
            'name'  => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $User->update($data);

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // cari data di table User berdasarkan "id" User
        $User = User::find($id);
        //dd($User);
        $User->delete();
        return redirect()->route('user.index')->with('succes','Data User Berhasil di Hapus');
    }
}
