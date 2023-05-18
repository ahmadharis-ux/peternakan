<table id="example" class="display " style="width:100%">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Nama</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Debit</th>
            <th scope="col">Kredit</th>
            <th scope="col">Saldo</th>
            <th scope="col">Jurnal</th>
            <th scope="col">Detail</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kas as $item)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ date('d/m/Y', strtotime($item->tanggal)) }}</td>
                <td><a href="#" class="text-primary">{{ $item->user->name }}</a></td>
                <td>{{ $item->keterangan }}</td>
                <td>Rp. {{ number_format($item->pembayaran->sum('debits')) }}</td>
                <td>Rp. {{ number_format($item->pembayaran->sum('kredits')) }}</td>
                <td>Rp. </td>
                <td><a href="#" class="text-primary">{{ $item->jurnal->name }}</a></td>
                <td><a href="/detail/kas/{{ $item->jurnal->id }}/{{ $item->id }}"
                        class="btn btn-sm text-primary">Lihat</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
