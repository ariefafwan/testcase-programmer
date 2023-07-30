<table>
    <thead>
        <tr>
            <th>#</th>
            <th>NIK</th>
            <th>NO KK</th>
            <th>Address</th>
            <th>Tempat Tanggal Lahir</th>
            <th>Agama</th>
            <th>Pekerjaan</th>
            <th>Nomor HP</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datapenduduk as $index => $row)
        <tr>
            <td scope="row">{{ $index + 1 }}</td>
            <td>{{ $row->nik }}</td>
            <td>{{ $row->kartu_keluarga->no_kk }}</td>
            <td>{{ $row->AlamatLengkap }}</td>
            <td>{{ $row->TempatTanggal }}</td>
            <td>{{ $row->agama }}</td>
            <td>{{ $row->pekerjaan }}</td>
            <td>{{ $row->nomor_hp }}</td>
        </tr>
        @endforeach
    </tbody>
</table>