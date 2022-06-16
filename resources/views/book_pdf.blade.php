<!DOCTYPE html>
<html>

<head>
    <title>Laporan Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 
</head>

<body>

    <center>
        <h5>Laporan Buku SMP Negeri 1 Kota Bengkulu</h4>
            <h6>Jl. Jendral. Sudirman, Tengah Padang, Kec. Tlk. Segara, Kota Bengkulu, Bengkulu 38114
        </h5>
    </center>

    <table class="table table-bordered border-primary">
        <thead>
            <tr>
 
                <th scope="col">Kategori Rak</th>
                <th scope="col">Judul Buku</th>

                <th scope="col">Pengarang</th>
                <th scope="col">Penerbit</th>
                <th scope="col">Tahun Terbit</th>
                <th scope="col">Eksemplar</th>
            </tr>
        </thead>
        <tbody>
       
            <tr>
                @foreach ($books as $book)
              
                    <td>{{ $book->rak->kategori }}</td>
                    <td>{{ $book->judul }}</td>
                
                    <td>{{ $book->pengarang }}</td>
                    <td>{{ $book->penerbit }}</td>
                    <td>{{ $book->thn_terbit }}</td>
                    <td>{{ $book->eksemplar }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
