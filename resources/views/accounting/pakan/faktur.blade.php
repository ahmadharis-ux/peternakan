@extends('layouts.faktur')
@php
    $totalDetailPembelianPakan = 0;
@endphp

@section('listItemTransaksi')
    {{--
 kolom:
    #
    Produk
    Kuantitas
    Harga
    Diskon
    Pajak
--}}

    @php
        $iteration = 1;
    @endphp

    {{-- detail penjualan --}}
    @foreach ($pembelianPakan->detailPembelianPakan as $item)
        @php
            $sdp = $item->harga * $item->qty;
            $totalDetailPembelianPakan += $sdp;
        @endphp
        <tr>
            <th style="width: 50px">{{ $iteration++ }}</th>
            <td>
                <div class="d-flex flex-column">
                    <span class="fw-bold">{{ $item->pakan->nama }}</span>
                    <span>@ {{ $item->satuanPakan->nama }}</span>
                </div>
            </td>
            <td class="text-center">{{ $item->qty }}</td>
            <td class="text-end">{{ number_format($item->harga) }}</td>
            <td class="text-center">0%</td>
            <td class="text-center">-</td>
            <td class="text-end">{{ number_format($sdp) }}</td>

        </tr>
    @endforeach

    {{-- operasional penjualan --}}
    @foreach ($pembelianPakan->operasionalPembelianPakan as $opr)
        <tr>
            <th style="width: 50px">{{ $iteration++ }}</th>
            <td>
                <div class="d-flex flex-column">
                    <span class="fw-bold">{{ $opr->keterangan }}</span>
                </div>
            </td>
            <td class="text-center">1</td>
            <td class="text-end">{{ number_format($opr->harga) }}</td>
            <td class="text-center">0%</td>
            <td class="text-center">-</td>
            <td class="text-end">{{ number_format($opr->harga) }}</td>
        </tr>
    @endforeach
@endsection

@section('subtotal')
    @php
        $subtotal = $totalDetailPembelianPakan;
        $subtotal += $pembelianPakan->operasionalPembelianPakan->sum('harga');
    @endphp

    {{ number_format($subtotal) }}
@endsection

@section('pajak')
    @php
        $pajak = 0;
    @endphp

    {{ number_format($pajak) }}
@endsection

@section('total')
    @php
        $total = $subtotal - $pajak;
    @endphp

    {{-- {{ number_format($kredit->nominal) }} --}}
    {{ number_format($total) }}
@endsection

@section('tunai')
    @php
        $tunai = $kredit->transaksiKredit->sum('nominal');
    @endphp

    {{ number_format($tunai) }}
@endsection

@section('sisaTagihan')
    {{ number_format($total - $tunai) }}
@endsection

@section('keterangan')
    <p>{{ $kredit->keterangan }}</p>
@endsection
