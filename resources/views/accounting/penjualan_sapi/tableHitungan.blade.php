@php

    // debit
    $totalDebitSapi = $listDetailPenjualan->sum('harga');
    $totalOperasional = $listOperasionalPenjualan->sum('harga');
    $totalDebit = $totalDebitSapi + $totalOperasional;

    // pembayaran
    $totalBayar = $listRiwayatTransaksi->sum('nominal');
    $sisaPembayaran = $totalDebit - $totalBayar;
    $statusDebit = $debit->lunas ? 'LUNAS' : 'BELUM LUNAS';

@endphp


<div class="row mt-3">
    <div class="col-sm">Penjualan sapi</div>
    <div class="col-sm d-flex justify-content-between">
        <span class="text-secondary">Rp</span>
        <span>
            {{ number_format($totalDebitSapi) }}
        </span>
    </div>
</div>


<div class="row">
    <div class="col-sm">Operasional</div>
    <div class="col-sm d-flex justify-content-between">
        <span class="text-secondary">Rp</span>
        <span>
            {{ number_format($totalOperasional) }}
        </span>
    </div>
</div>

<div class="row">
    <div class="col">
        <hr>
    </div>
    <div class="col-1">+</div>
</div>

<div class="row">
    <div class="col-sm">Total debit</div>
    <div class="col-sm d-flex justify-content-between">
        <span class="text-secondary">Rp</span>
        <span class="">
            {{ number_format($totalDebit) }}
        </span>
    </div>
</div>

<div class="row">
    <div class="col-sm ">Tunai</div>
    <div class="col-sm d-flex justify-content-between">
        <span class="text-secondary">Rp</span>
        <span>
            -{{ number_format($totalBayar) }}
        </span>
    </div>
</div>

<div class="row fw-bold">
    <div class="col-sm ">Sisa debit</div>
    <div class="col-sm d-flex justify-content-between">
        <span class="text-secondary">Rp</span>
        <span>
            {{ number_format($sisaPembayaran) }}
        </span>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-sm">Status</div>
    <div class="col-sm d-flex justify-content-center">
        <span class="fw-bold">
            {{ $statusDebit }}
        </span>
    </div>
</div>
