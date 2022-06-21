<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\Member;
use App\Models\Transaction;
use PDF;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.reports.index', [
            'active' => 'reports',
        ]);
    }
    public function books()
    {
        $books = Book::all();

        $pdf = PDF::loadView('book_pdf', ['books' => $books]);
        return $pdf->download('laporan-buku.pdf');
    }

    public function users()
    {
        $users = User::all();

        $pdf = PDF::loadview('user_pdf', ['users' => $users]);
        return $pdf->download('laporan-user.pdf');
    }
    public function members()
    {
        $members = Member::all();

        $pdf = PDF::loadview('member_pdf', ['members' => $members]);
        return $pdf->download('laporan-member.pdf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function transactions(Request $request)
    {
        $transactions = Transaction::whereBetween('tgl_pinjam', [$request->tgl_awal, $request->tgl_akhir])->get();

        $pdf = PDF::loadview('transactions_pdf', ['transactions' => $transactions]);
        return $pdf->download('laporan-transactions.pdf');
    }

    public function confirm()
    {
        return view('dashboard.reports.confirm', [
            'dateawal' => Transaction::min('tgl_pinjam'),
            'dateakhir' => Transaction::max('tgl_pinjam'),
            'active' => 'reports',
        ]);
    }
}
