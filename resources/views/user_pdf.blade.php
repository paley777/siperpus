<!DOCTYPE html>
<html>

<head>
    <title>Laporan Petugas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>

    <center>
        <h5>Laporan Petugas SD Negeri 69 Kota Bengkulu</h4>
            <h6>Jl. Wr. Supratman, Kandang Limun, Kec. Muara Bangkahulu, Kota Bengkulu, Bengkulu 38123
        </h5>
    </center>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Alamat</th>
                <th scope="col">Nomor Telepon</th>
                <th scope="col">E-mail</th>


            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($users as $user)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->jabatan }}</td>
                    <td>{{ $user->alamat }}</td>
                    <td>{{ $user->no_tlp }}</td>
                    <td>{{ $user->email }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
