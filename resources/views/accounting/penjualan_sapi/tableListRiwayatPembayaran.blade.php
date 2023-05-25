@php
    $sumNominal = $listRiwayatTransaksi->sum('nominal');
    $sumAdm = $listRiwayatTransaksi->sum('adm');

    $totalBayar = number_format($sumNominal);
    $totalIncludeAdm = number_format($sumNominal + $sumAdm);
@endphp


<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal</th>
            {{-- <th scope="col">Keterangn</th> --}}
            {{-- <th scope="col" class="text-center">Adm</th> --}}
            <th scope="col" class="text-center">Nominal</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listRiwayatTransaksi as $item)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                {{-- <td class="text-end text-secondary">{{ number_format($item->adm) }}</td> --}}
                <td class="text-end">{{ number_format($item->nominal) }}</td>

            </tr>
        @endforeach
        <tr>
            <th colspan="2">Total</th>
            {{-- <td class="text-secondary fw-bold text-end">Rp {{ number_format($sumAdm) }}</td> --}}
            <td class="fw-bold text-end">Rp {{ $totalBayar }}</td>
        </tr>
        {{-- <tr class="text-secondary">
            <td colspan="3">Include adm</td>
            <td class="text-end">Rp {{ $totalIncludeAdm }}</td>
        </tr> --}}

        </div>
</table>
