{{-- histori pembelian sapi --}}
<div class="col-md">
    @include('accounting.user.accounting.histori_aktivitas.pembelianSapi')
</div>

{{-- history penjualan sapi --}}
<div class="col-md">
    @include('accounting.user.accounting.histori_aktivitas.penjualanSapi')
</div>

{{-- histori pembelian pakan --}}
<div class="col-md">
    @include('accounting.user.accounting.histori_aktivitas.pembelianPakan')
</div>

{{-- histori trx kredit --}}
<div class="col-md">
    @include('accounting.user.accounting.histori_aktivitas.transaksiKredit')
</div>

{{-- histori trx debit --}}
<div class="col-md">
    @include('accounting.user.accounting.histori_aktivitas.transaksiDebit')
</div>

{{-- histori pemakaian pakan --}}
<div class="col-md">
    @include('accounting.user.accounting.histori_aktivitas.pemakaianPakan')
</div>

{{-- histori faktur dicetak --}}
<div class="col-md">
    @include('accounting.user.accounting.histori_aktivitas.fakturDibuat')
</div>
