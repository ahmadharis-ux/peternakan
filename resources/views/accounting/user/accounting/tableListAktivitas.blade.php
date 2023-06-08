<table id="example" class="display " style="width:100%">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal</th>
            <th scope="col">ID</th>
            <th scope="col">Jurnal</th>
            <th scope="col">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listAktivitas as $aktivitas)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ date('d/m/Y', strtotime($aktivitas->created_at)) }}</td>
                <td>{{ $aktivitas->keterangan }}</td>
                <td> {{$aktivitas->id_jurnal}}</td>
                <td>
                    <a href="/acc/user/{{ $user->id }}/piutang/{{ $aktivitas->id }}" class="btn btn-primary">
                        <div class="icon">
                            <i class="bi bi-eye-fill"></i>
                        </div>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
