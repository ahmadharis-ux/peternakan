@php
    // kredit
    $totalKreditSapi = $listDetailPembelian->sum('harga');
    $totalOperasional = $listOperasionalPembelian->sum('harga');
    $totalKredit = $totalKreditSapi + $totalOperasional;

    // pembayaran
    $totalBayar = $listRiwayatTransaksi->sum('nominal');
    $sisaPembayaran = $totalKredit - $totalBayar;
    $statusKredit = $sisaPembayaran > 0 ? 'BELUM LUNAS' : 'LUNAS';

@endphp


<div class="row mt-3">
    <div class="col-sm">Total</div>
    <div class="col-sm d-flex justify-content-between fw-bold">
        <span>Rp</span>
        <span>
            {{ number_format($totalKredit) }}
        </span>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-sm">Tunai</div>
    <div class="col-sm d-flex justify-content-between fw-bold">
        <span>Rp</span>
        <span>
            {{ number_format($totalBayar) }}
        </span>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-sm">Sisa Pembayaran</div>
    <div class="col-sm d-flex justify-content-between fw-bold">
        <span>Rp</span>
        <span>
            {{ number_format($sisaPembayaran) }}
        </span>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-sm">Status</div>
    <div class="col-sm d-flex justify-content-center fw-bold">
        <span>
            {{ $statusKredit }}
        </span>
    </div>
</div>
