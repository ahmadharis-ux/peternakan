<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listRole as $role)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $role->nama }}</td>
                <td>

                    <button class="badge bg-warning border-0" data-bs-toggle="modal"
                        data-bs-target="#modalEditRoleBaru{{ $role->id }}">Edit</button>
                    {{-- modal --}}
                    @include('admin.role.modalEdit')
                    <form action="/admin/role/delete/{{ $role->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0">Hapus</button>
                    </form>

                </td>
            </tr>
        @endforeach
    </tbody>

</table>
