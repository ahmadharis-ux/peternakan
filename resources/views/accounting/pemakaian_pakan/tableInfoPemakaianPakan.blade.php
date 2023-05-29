<div class="d-flex flex-column ps-3 justify-content-center" style="width: 100%;" id="info">

    <div style="background: transparent" class="mb-5">
        <label>Pekerja</label>
        <select name="id_pekerja" class="form-select" required value>
            <option disabled selected>-- Pilih pekerja --</option>
            @foreach ($listPekerja as $pekerja)
                <option value="{{ $pekerja->id }}">{{ $pekerja->fullname }}</option>
            @endforeach
        </select>

    </div>

    <div class="d-flex justify-content-between px-3 py-1">
        <span class="fw-bold">Total nilai pakan</span>
        <span id="totalNilaiPakan">0</span>
    </div>

    <div class="d-flex justify-content-between px-3 py-1">
        <span class="fw-bold">Total sapi</span>
        <span id="totalSapi">0</span>
    </div>

    <div class="d-flex justify-content-between px-3 py-1">
        <span class="fw-bold">Markup per sapi</span>
        <span id="markupPerSapi">0</span>

    </div>

    <div class="d-flex justify-content-between px-3 py-1">
        <span class="fw-bold">Markup pembulatan</span>
        <span id="markupPembulatan">0</span>
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
