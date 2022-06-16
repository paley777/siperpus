<!DOCTYPE html>
<html>

<head>
    <title>Laporan Anggota</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

    <center>
        <h5>Laporan Anggota SMP Negeri 1 Kota Bengkulu</h4>
            <h6>Jl. Jendral. Sudirman, Tengah Padang, Kec. Tlk. Segara, Kota Bengkulu, Bengkulu 38114
        </h5>
    </center>

    <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Tempat Lahir</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Alamat</th>
                <th scope="col">Nomor Telepon</th>
                <th scope="col">Jenis Anggota</th>


            </tr>
        </thead>
        <tbody>
            <tr>
                @php $i=1 @endphp
                @foreach ($members as $member)
                    <td>{{ $i++ }}</td>
                    <td>{{ $member->nama }}</td>
                    <td>{{ $member->tmpt_lahir }}</td>
                    <td>{{ $member->tgl_lahir }}</td>
                    <td>{{ $member->jns_kelamin }}</td>
                    <td>{{ $member->alamat }}</td>
                    <td>{{ $member->no_hp }}</td>
                    <td>{{ $member->jns_anggota }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
