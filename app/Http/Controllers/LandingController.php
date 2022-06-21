<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Rak;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing.index', [
            'active' => 'index',
        ]);
    }

    public function opac()
    {
        return view('landing.opac', [
            'active' => 'opac',
            'books' => Book::orderBy('rak_id', 'desc')
                ->filter(request(['search']))
                ->paginate(7)
                ->withQueryString(),
        ]);
    }

    public function barcode()
    {
        return view('landing.barcode', [
            'active' => 'opac',
            'books' => Book::latest()
                ->filter(request(['barcode']))
                ->paginate(7)
                ->withQueryString(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function paket(Request $request)
    {
        $id = Rak::where('kategori', $request['kategori'])->value('id');
        return view('landing.paket.index', [
            'active' => 'opac',
            'books' => Book::where('rak_id', $id)
                ->paginate(10),
        ]);
    }

    public function about()
    {
        return view('landing.about', [
            'active' => 'about',
        ]);
    }

    public function helper()
    {
        return view('landing.helper', [
            'active' => 'helper',
        ]);
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        } else {
            return view('landing.login', [
                'active' => 'login',
            ]);
        }
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()
                ->intended('/dashboard')
                ->with('success', 'Selamat Datang di Dashboard SIPerpus!');
        }

        return back()->with('loginError', 'E-mail/Password Anda Salah, Coba Lagi!');
    }
}
