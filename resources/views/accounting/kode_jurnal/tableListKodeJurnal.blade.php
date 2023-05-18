
<table id="example" class="display " style="width:100%">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Kode</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Author</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listKodeJurnal as $kodejurnal)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $kodejurnal->kode }}</td>
                <td>{{ $kodejurnal->keterangan }}</td>
                <td>{{ $kodejurnal->user->nama_depan }}</td>
                <td>
                    <button class="btn btn-sm btn-warning" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalEditKodeJurnalBaru{{$kodejurnal->id}}">Edit</button>
                        {{-- modal --}}
                        @include('accounting.kode_jurnal.modalEdit')
                    <a href="/kodejurnal/delete/{{$kodejurnal->id}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Hapus</a>
                    
                </td>
            </tr>
        @endforeach
    </tbody>

</table>
