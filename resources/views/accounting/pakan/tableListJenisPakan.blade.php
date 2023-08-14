<button type="button" class="btn btn-sm btn-primary mb-3" data-bs-toggle="modal"
    data-bs-target="#modalCreateJenisPakan">Tambah Jenis
    Pakan</button>

<table id="example1" class="display" style="width:100%">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ListPakan as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
