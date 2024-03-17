<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rak;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Imports\BookImport;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.books.index', [
            'active' => 'books',
            'books' => Book::orderBy('rak_id', 'desc')
                ->filter(request(['search']))
                ->paginate(10)
                ->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.books.create', [
            'raks' => Rak::orderBy('kategori', 'asc')->get(),
            'active' => 'books',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $validatedData = $request->validate([
            'rak_id' => 'required',
            'judul' => 'required|unique:books',
            'no_barcode' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'thn_terbit' => 'required',
            'eksemplar' => 'required',
        ]);
        Book::create($validatedData);

        return redirect('/dashboard/books')->with('success', 'Buku baru telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('dashboard.books.edit', [
            'raks' => Rak::orderBy('kategori', 'asc')->get(),
            'book' => $book,
            'active' => 'books',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $rules = [
            'id' => 'required',
            'rak_id' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'thn_terbit' => 'required',
            'eksemplar' => 'required',
        ];
        if ($request->judul != $book->judul) {
            $rules['judul'] = 'required|unique:books';
        }
        if ($request->no_barcode != $book->no_barcode) {
            $rules['no_barcode'] = 'required';
        }

        $validatedData = $request->validate($rules);
        Book::where('id', $validatedData['id'])->update($validatedData);

        return redirect('/dashboard/books')->with('success', 'Buku telah diubah!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        Book::destroy($book->id);

        return redirect('/dashboard/books')->with('success', 'Buku telah dihapus.');
    }

    public function import(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx',
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder imports di dalam folder public
        $file->move('imports', $nama_file);

        // import data
        Excel::import(new BookImport(), public_path('/imports/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Data Buku Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect('/dashboard/books');
    }
}
