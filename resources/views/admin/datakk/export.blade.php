<table>
    <thead>
        <tr>
            <th>#</th>
            <th>NO KK</th>
            <th>Address</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datakk as $index => $row)
        <tr>
            <td scope="row">{{ $index + 1 }}</td>
            <td>{{ $row->no_kk }}</td>
            <td>{{ $row->AlamatLengkap }}</td>
        </tr>
        @endforeach
    </tbody>
</table>