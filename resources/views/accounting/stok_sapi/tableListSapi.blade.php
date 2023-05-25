<table id="example" class="display ">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Eartag</th>
            <th scope="col">Jenis</th>
            <th scope="col">Bobot</th>
            <th scope="col">Jenis kelamin</th>
            <th scope="col">Harga Pokok</th>
            <th scope="col">Kondisi</th>
            <th scope="col">Status</th>
            <th scope="col"></th>

        </tr>
    </thead>
    <tbody>
        @foreach ($listSapi as $sapi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $sapi->eartag }}</td>
                <td>{{ $sapi->jenisSapi->nama }}</td>
                <td>{{ $sapi->bobot }} kg</td>
                <td>{{ $sapi->jenis_kelamin }}</td>
                <td>{{ $sapi->harga_pokok }}</td>
                <td>{{ $sapi->kondisi }}</td>
                <td>{{ $sapi->status }}</td>
                <td>
                    <a href="/acc/sapi/{{ $sapi->id }}" class="btn btn-sm btn-primary btnPilihSapi"
                        data-id-sapi="{{ $sapi->id }}"><span><i class="bi-eye-fill"></i></span></a>
                </td>
            </tr>
        @endforeach

    <tbody>
</table>
