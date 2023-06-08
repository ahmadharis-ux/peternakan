<table id="example" class="display " style="width:100%">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Kredit</th>
            <th scope="col">Detail</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listKredit as $kredit)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $kredit->created_at }}</td>
                <td>{{ $kredit->keterangan }}</td>
                <td><span class="text-secondary">Rp</span> {{ number_format($kredit->nominal) }}</td>
                <td>
                    <a href="/acc/user/{{ $user->id }}/hutang/{{ $kredit->id }}" class="btn btn-primary">
                        <div class="icon">
                            <i class="bi bi-eye-fill"></i>
                        </div>
                    </a>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>
