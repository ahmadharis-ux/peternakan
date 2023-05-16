<div class="row mt-3">
    <div class="col-sm">Total : </div>
    <div class="col-sm justify-content-end">
        Rp,
        {{ number_format($data->hutang->sum('total_harga') + !$data->operasional->sum('nominal')) }}
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm">Tunai : </div>
    <div class="col-sm justify-content-end">
        Rp. {{ number_format($data->pembayaran->sum('kredit')) }}
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm">Sisa Pembayaran : </div>
    <div class="col-sm justify-content-end">
        Rp.
        {{ number_format($data->hutang->sum('total_harga') + $data->operasional->sum('nominal') - $data->pembayaran->sum('kredit')) }}
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm">Status : </div>
    <div class="col-sm justify-content-end">
        @if ($data->pembayaran->sum('kredit') == $data->hutang->sum('total_harga') + $data->operasional->sum('nominal'))
            Lunas
        @elseif($data->pembayaran->sum('kredit') < $data->hutang->sum('total_harga') + $data->operasional->sum('nominal'))
            Belum Lunas
        @endif
    </div>
</div>
