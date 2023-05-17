@php
    $sumNominal = $listRiwayatTransaksi->sum('nominal');
    $sumAdm = $listRiwayatTransaksi->sum('adm');

    $subTotal = number_format($sumNominal + $sumAdm);
    $subTotalTanpaAdm = number_format($sumNominal);
@endphp


<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal</th>
            {{-- <th scope="col">Keterangn</th> --}}
            <th scope="col" class="text-center">Adm</th>
            <th scope="col" class="text-center">Nominal</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listRiwayatTransaksi as $item)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                <td class="text-end">{{ number_format($item->adm) }}</td>
                <td class="text-end">{{ number_format($item->nominal) }}</td>
            </tr>
        @endforeach
        <tr>
            <th colspan="3">Subtotal</th>
            {{-- <td class="fw-bold text-end">Rp {{ $subTotal }}</td> --}}
            <td class="fw-bold text-end">Rp {{ $subTotalTanpaAdm }}</td>
        </tr>
    </tbody>
</table>
