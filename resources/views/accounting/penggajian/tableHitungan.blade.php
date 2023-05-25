@php

    // kredit
    // $totalKreditSapi = $listDetailPembelian->sum('harga');
    // $totalOperasional = $listOperasionalPembelian->sum('harga');
    // $totalKredit = $totalKreditSapi + $totalOperasional;

    // // pembayaran
    $totalBayar = $listRiwayatTransaksi->sum('nominal');
    $sisaPembayaran = $kreditPenggajian->nominal - $totalBayar;
    $statusKredit = $kreditPenggajian->lunas ? 'LUNAS' : 'BELUM LUNAS';
@endphp


<div class="row">
    <div class="col-sm">Gaji</div>
    <div class="col-sm d-flex justify-content-between">
        <span class="text-secondary">Rp</span>
        <span class="">
            {{ number_format($kreditPenggajian->nominal) }}
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
    <div class="col-sm ">Sisa gaji</div>
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
