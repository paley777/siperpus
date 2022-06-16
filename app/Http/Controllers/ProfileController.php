<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('dashboard.profiles.show', [
            'user' => User::find(Auth::id()),
            'active' => 'profiles',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.profiles.edit', [
            'user' => User::find(Auth::id()),
            'active' => 'profiles',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = Auth::user();
        $rules = [
            'id' => 'required',
            'nama' => 'required',
            'nip' => 'required',
            'email' => 'required',
            'no_tlp' => 'required',
            'alamat' => 'required',
            'jabatan' => 'required',
            'password' => 'required',
            'nama_gambar' => 'image|file|max:50000',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('nama_gambar')) {
            if ($user->nama_gambar) {
                Storage::delete($user['nama_gambar']);
            }

            $validatedData['nama_gambar'] = $request->file('nama_gambar')->store('images');
        }
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::where('id', Auth::id())->update($validatedData);

        return redirect('/dashboard')->with('success', 'Profil telah diubah!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
