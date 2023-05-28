<table id="example" class="display " style="width:100%">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Role</th>
            <th scope="col">Email</th>
            <th scope="col">Telepon</th>
            <th scope="col">Alamat</th>
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
            </tr>
        @endforeach
    </tbody>

</table>
