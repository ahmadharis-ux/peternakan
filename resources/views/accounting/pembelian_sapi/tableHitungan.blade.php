@php

    // kredit
    $totalKreditSapi = $listDetailPembelian->sum('harga');
    $totalOperasional = $listOperasionalPembelian->sum('harga');
    $totalKredit = $totalKreditSapi + $totalOperasional;

    // pembayaran
    $totalBayar = $listRiwayatTransaksi->sum('nominal');
    $sisaPembayaran = $totalKredit - $totalBayar;
    $statusKredit = $kredit->lunas ? 'LUNAS' : 'BELUM LUNAS';

@endphp


<div class="row mt-3">
    <div class="col-sm">Pembelian sapi</div>
    <div class="col-sm d-flex justify-content-between">
        <span class="text-secondary">Rp</span>
        <span>
            {{ number_format($totalKreditSapi) }}
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
    <div class="col"><hr></div>
    <div class="col-1">+</div>
</div>

<div class="row">
    <div class="col-sm">Total kredit</div>
    <div class="col-sm d-flex justify-content-between">
        <span class="text-secondary">Rp</span>
        <span class="">
            {{ number_format($totalKredit) }}
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
    <div class="col-sm ">Sisa kredit</div>
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
            {{ $statusKredit }}
        </span>
    </div>
</div>
