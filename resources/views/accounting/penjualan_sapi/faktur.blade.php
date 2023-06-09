@extends('layouts.faktur')

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
    @foreach ($penjualanSapi->detailPenjualanSapi as $item)
        @php
            $sapi = $item->sapi;
        @endphp
        <tr>
            <th style="width: 50px">{{ $iteration++ }}</th>
            <td>
                <div class="d-flex flex-column">
                    <span class="fw-bold">{{ $sapi->eartag }}</span>
                    <span>Sapi {{ $sapi->jenisSapi->nama }}</span>
                </div>
            </td>
            <td class="text-center">1</td>
            <td class="text-end">{{ number_format($item->harga) }}</td>
            <td class="text-center">0%</td>
            <td class="text-center">-</td>
            <td class="text-end">{{ number_format($item->harga) }}</td>

        </tr>
    @endforeach

    {{-- operasional penjualan --}}
    @foreach ($penjualanSapi->operasionalPenjualanSapi as $opr)
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
        $subtotal = $penjualanSapi->detailPenjualanSapi->sum('harga');
        $subtotal += $penjualanSapi->operasionalPenjualanSapi->sum('harga');
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

    {{ number_format($total) }}
@endsection

@section('tunai')
    @php
        $tunai = $debit->transaksiDebit->sum('nominal');
    @endphp

    {{ number_format($tunai) }}
@endsection

@section('sisaTagihan')
    {{ number_format($total - $tunai) }}
@endsection

@section('keterangan')
    <p>{{ $subjek }}</p>
    <p>{{ $debit->keterangan }}</p>
@endsection
