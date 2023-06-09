<h5></h5>
<table id="example" class="display " style="width:100%">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Pengeluaran</th>
            <th scope="col">Jumlah sapi</th>
            <th scope="col">Detail</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listPemakaianPakan as $pemakaianPakan)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $pemakaianPakan->created_at }}</td>
                <td>{{ $pemakaianPakan->keterangan }}</td>
                <td>Rp {{ number_format($pemakaianPakan->total_pengeluaran) }}</td>
                <td>{{ $pemakaianPakan->Markup->count('id_pemakaian_pakan') }}</td>
                <td>
                    <a href="/acc/pemakaian_pakan/{{ $pemakaianPakan->id }}" class="btn btn-primary">
                        <div class="icon">
                            <i class="bi bi-eye-fill"></i>
                        </div>
                    </a>
                </td>

            </tr>
        @endforeach

    </tbody>
</table>
