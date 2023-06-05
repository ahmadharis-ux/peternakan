<div class="card col-4">
    <div class="card-title px-3">Profile Customer</div>
    <div class="container mb-2">
        <table>
            <tr>
                <th>Nama </th>
                <td> : </td>
                <td>{{$user->nama_depan}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td> : </td>
                <td>{{$user->email}}</td>
            </tr>
            <tr>
                <th>Telepon</th>
                <td> : </td>
                <td>{{$user->telepon}}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td> : </td>
                <td>{{$user->alamat}}</td>
            </tr>
        </table>
    </div>
</div>
<div class="card recent-sales overflow-auto">
    <div class="card-title px-3">Aktifitas Akuntan</div>
    <div class="card-body">
        @include('accounting.user.accounting.tableListAktivitas')
    </div>
</div>
