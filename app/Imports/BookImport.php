<?php

namespace App\Imports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\ToModel;

class BookImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Book([
            'judul' => $row[0],
            'no_barcode' => $row[1],
            'pengarang' => $row[2],
            'penerbit' => $row[3],
            'thn_terbit' => $row[4],
            'eksemplar' => $row[5],
        ]);
    }
}
