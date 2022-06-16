<!DOCTYPE html>
<html>

<head>
    <title>Laporan Petugas</title>
   

</head>

<body>

    <center>
        <h5>Laporan Petugas SMP Negeri 1 Kota Bengkulu</h4>
            <h6>Jl. Jendral. Sudirman, Tengah Padang, Kec. Tlk. Segara, Kota Bengkulu, Bengkulu 38114
        </h5>
    </center>

    <table class="table table-bordered border-primary">
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
            <tr>
                @foreach ($users as $user)
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
