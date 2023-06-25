<div class="d-flex flex-column justify-content-center" style="width: 100%;" id="info">
    <div class="d-flex justify-content-between px-3 py-1">
        <span class="fw-bold">Total nilai pakan</span>
        <span>Rp {{ number_format($pemakaianPakan->total_pengeluaran) }}</span>
    </div>

    <div class="d-flex justify-content-between px-3 py-1">
        <span class="fw-bold">Total sapi</span>
        <span>{{ sizeof($pemakaianPakan->markup) }}</span>
    </div>

    <div class="d-flex justify-content-between px-3 py-1">
        <span class="fw-bold">Markup per sapi</span>
        <span>Rp {{ number_format($pemakaianPakan->markupPerSapi) }}</span>

    </div>

    <div class="d-flex justify-content-between px-3 py-1">
        <span class="fw-bold">Markup pembulatan</span>
        <span>Rp {{ number_format($pemakaianPakan->markupPembulatan) }}</span>
    </div>
</div>

<style>
    #info div:nth-child(odd) {
        background-color: rgb(236, 236, 236)
    }

    #info div:nth-child(even) {
        background-color: rgb(245, 245, 245)
    }
</style>
