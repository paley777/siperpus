<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use App\Models\Book;
use App\Http\Requests\StoreRakRequest;
use App\Http\Requests\UpdateRakRequest;

class RakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.raks.index', [
            'active' => 'raks',
            'raks' => Rak::latest()->paginate(7),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.raks.create', [
            'active' => 'raks',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRakRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRakRequest $request)
    {
        $validatedData = $request->validate([
            'kategori' => 'required|unique:raks',
        ]);
        Rak::create($validatedData);

        return redirect('/dashboard/raks')->with('success', 'Kategori baru telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rak  $rak
     * @return \Illuminate\Http\Response
     */
    public function show(Rak $rak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rak  $rak
     * @return \Illuminate\Http\Response
     */
    public function edit(Rak $rak)
    {
        return view('dashboard.raks.edit', [
            'rak' => $rak,
            'active' => 'raks',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRakRequest  $request
     * @param  \App\Models\Rak  $rak
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRakRequest $request, Rak $rak)
    {
        $rules = [
            'id' => 'required',
            'kategori' => 'required|unique:raks',
        ];
        $validatedData = $request->validate($rules);
        Rak::where('id', $validatedData['id'])->update($validatedData);

        return redirect('/dashboard/raks')->with('success', 'Kategori telah diubah!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rak  $rak
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rak $rak)
    {
        Rak::destroy($rak->id);
        Book::where('rak_id', $rak->id)->delete();
        return redirect('/dashboard/raks')->with('success', 'Kategori Rak telah dihapus.');
    }
}
