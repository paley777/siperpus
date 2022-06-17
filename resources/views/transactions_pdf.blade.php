<!DOCTYPE html>
<html>

<head>
    <title>Laporan Transaksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body style="margin-left: 0cm;">

    <center>
        <h5>Laporan Transaksi SMP Negeri 1 Kota Bengkulu</h4>
            <h6>Jl. Jendral. Sudirman, Tengah Padang, Kec. Tlk. Segara, Kota Bengkulu, Bengkulu 38114
        </h5>
    </center>
    <table class="table table-bordered border-primary px-0">
        <thead>
            <tr>

                <th scope="col-2">Buku yang Dipinjam</th>
                <th scope="col-2">Nama Peminjam</th>
                <th scope="col-2">Tanggal Peminjaman</th>
                <th scope="col-2">Tanggal Pengembalian</th>
                <th scope="col-2">Denda</th>
                <th scope="col-2">Jumlah Pinjam</th>

            </tr>
        </thead>
        <tbody>
            <tr>

                @foreach ($transactions as $transaction)
                    <td>{{ $transaction->book->judul }}</td>
                    <td>{{ $transaction->member->nama }}</td>
                    <td>{{ $transaction->tgl_pinjam }}</td>
                    <td>{{ $transaction->tgl_pengembalian }}</td>
                    <td>{{ $transaction->denda }}</td>
                    <td>{{ $transaction->jml_pinjam }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
