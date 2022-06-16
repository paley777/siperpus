<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Member;
use App\Models\Book;

class PrintController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function print_user(Request $request)
    {
        return view('dashboard.print.printuser', [
            'user' => User::where('id', $request->id)->first(),
            'active' => 'users',
        ]);
    }
    public function print_member(Request $request)
    {
        return view('dashboard.print.printmember', [
            'member' => Member::where('id', $request->id)->first(),
            'active' => 'members',
        ]);
    }
    public function print_book(Request $request)
    {
        return view('dashboard.print.printbook', [
            'book' => Book::where('id', $request->id)->first(),
            'active' => 'books',
        ]);
    }
}
