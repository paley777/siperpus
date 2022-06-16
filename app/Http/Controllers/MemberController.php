<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.members.index', [
            'members' => Member::orderBy('nama')
                ->filter(request(['search']))
                ->paginate(10)
                ->withQueryString(),
            'active' => 'members',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.members.create', [
            'active' => 'members',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMemberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemberRequest $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'tmpt_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jns_kelamin' => 'required',
            'jns_anggota' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'nama_gambar' => 'image|file|max:50000',
        ]);
        if ($request->file('nama_gambar')) {
            $validatedData['nama_gambar'] = $request->file('nama_gambar')->store('images');
        }
        Member::create($validatedData);

        return redirect('/dashboard/members')->with('success', 'Anggota baru telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('dashboard.members.edit', [
            'member' => $member,
            'active' => 'members',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMemberRequest  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {
        $rules = [
            'id' => 'required',
            'nama' => 'required',
            'tmpt_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jns_kelamin' => 'required',
            'jns_anggota' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'nama_gambar' => 'image|file|max:50000',
        ];
        $validatedData = $request->validate($rules);

        if ($request->file('nama_gambar')) {
            if ($member->nama_gambar) {
                Storage::delete($member['nama_gambar']);
            }

            $validatedData['nama_gambar'] = $request->file('nama_gambar')->store('images');
        }
        Member::where('id', $validatedData['id'])->update($validatedData);

        return redirect('/dashboard/members')->with('success', 'Anggota telah diubah!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        if ($member->nama_gambar) {
            Storage::delete($member['nama_gambar']);
        }
        Member::destroy($member->id);

        return redirect('/dashboard/members')->with('success', 'Anggota telah dihapus.');
    }
}
