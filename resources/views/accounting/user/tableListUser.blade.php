<table id="example" class="display " style="width:100%">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col" class="col-3">Nama</th>
            <th scope="col">Role</th>
            <th scope="col">Email</th>
            <th scope="col">Telepon</th>
            <th scope="col">Alamat</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listUser as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->fullname }}</td>
                <td>{{ $user->role->nama }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->telepon }}</td>
                <td>{{ $user->alamat }}</td>
                <td>

                    {{-- btn lihat detail --}}
                    <a href="/acc/user/{{ $user->id }}" class="btn btn-primary btn-sm mx-1">
                        <div class="icon">
                            <i class="bi bi-eye-fill"></i>
                        </div>
                    </a>

                    <button data-bs-toggle="modal" data-bs-target="#modalEditUser-{{ $user->id }}"
                        class="btn btn-warning text-white btn-sm mx-1">
                        <div class="icon">
                            <i class="bi bi-pencil-fill"></i>
                        </div>
                    </button>

                    <button data-bs-toggle="modal" data-bs-target="#modalDeleteUser-{{ $user->id }}"
                        class="btn btn-danger btn-sm mx-1">
                        <div class="icon">
                            <i class="bi bi-trash-fill"></i>
                        </div>
                    </button>
                </td>
            </tr>

            @include('accounting.user.modalEdit')
            @include('accounting.user.modalDelete')
        @endforeach
    </tbody>

</table>
