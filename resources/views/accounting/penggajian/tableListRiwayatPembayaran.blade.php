@php
    // $sumNominal = $listRiwayatTransaksi->sum('nominal');
    // $sumAdm = $listRiwayatTransaksi->sum('adm');

    // $totalBayar = number_format($sumNominal);
    // $totalIncludeAdm = number_format($sumNominal + $sumAdm);
@endphp

<table class="display" id="example" style="width:100%">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Keterangan</th>
            <th scope="col" class="text-center">Adm</th>
            <th scope="col" class="text-center">Nominal</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listRiwayatTransaksi as $transaksi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $transaksi->created_at }}</td>
                <td>{{ $transaksi->keterangan }}</td>
                <td>{{ $transaksi->adm }}</td>
                <td>{{ $transaksi->nominal }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
