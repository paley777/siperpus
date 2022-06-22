<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.users.index', [
            'users' => User::first()
                ->orderBy('nama')
                ->filter(request(['search']))
                ->paginate(10)
                ->withQueryString(),
            'active' => 'users',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create', [
            'active' => 'users',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'email' => 'required',
            'no_tlp' => 'required',
            'alamat' => 'required',
            'jabatan' => 'required',
            'password' => 'required',
            'nama_gambar' => 'image|file|max:50000',
        ]);

        if ($request->file('nama_gambar')) {
            $validatedData['nama_gambar'] = $request->file('nama_gambar')->store('images');
        }

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);

        return redirect('/dashboard/users')->with('success', 'Petugas baru telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'user' => $user,
            'active' => 'users',
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
        User::where('id', $validatedData['id'])->update($validatedData);

        return redirect('/dashboard/users')->with('success', 'Profil telah diubah!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->nama_gambar) {
            Storage::delete($user['nama_gambar']);
        }
        User::destroy($user->id);

        return redirect('/dashboard/users')->with('success', 'Petugas telah dihapus.');
    }
}
