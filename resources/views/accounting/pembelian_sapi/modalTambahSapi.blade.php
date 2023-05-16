<div class="modal fade" id="modalTambahSapi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <form action="/storesapi" method="post" enctype="multipart/form-data">
                @csrf
                {{-- <input type="hidden" name="kas_id" value="" class="form-control"> --}}


                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah sapi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-5">

                    {{-- jenis sapi --}}
                    <div class="row mb-3">
                        <div class="col">
                            <label for="">Jenis sapi</label>
                            <select name="jenis_sapi" class="form-select">
                                @foreach ($listJenisSapi as $jenisSapi)
                                    <option value="$jenisSapi->id">{{ $jenisSapi->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- jenis kelamin sapi  --}}
                    <div class="row mb-3">
                        <div class="col">
                            <label for="">Jenis kelamin sapi</label>
                            <select name="jenis_sapi" class="form-select">
                                <option value="jantan" selected>Pejantan</option>
                                <option value="betina">Betina</option>
                            </select>
                        </div>
                    </div>

                    {{-- eartag dan bobot --}}
                    <div class="row mb-3">
                        <div class="col">
                            <label for="">Eartag</label>
                            <input type="text" name="eartag" value="" class="form-control" required>
                        </div>

                        <div class="col">
                            <label for="">Bobot (kg)</label>
                            <input type="number" name="bobot" value="" class="form-control number-only"
                                required>
                        </div>
                    </div>


                    {{-- opsi pembelian --}}
                    <div class="row mb-3 form-check">
                        <p>Opsi pembelian</p>
                        <div class="col">
                            <label for="">Kiloan</label>
                            <input type="radio" name="opsi_beli" value="kiloan" class="form-check-input">
                        </div>

                        <div class="col">
                            <label for="">Per ekor</label>
                            <input type="radio" name="opsi_beli" value="ekoran" class="form-check-input">
                        </div>
                    </div>





                    <div class="col-sm-4 mb-3">
                        <label for="">Harga / Kg</label>
                        <input type="number" name="harga_kg" value="" class="form-control number-only" required>
                    </div>

                    <div class="col-sm-12 mb-3">
                        <label for="">Total Harga</label>
                        <input type="number" name="total_harga" readonly value=""
                            class="form-control number-only" required>
                    </div>

                    <div class="col-sm-12 mb-3">
                        <label for="">Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="" cols="30" rows="10" required></textarea>
                    </div>

                    <div class="col-sm-12 mb-3">
                        <label for="">Kondisi</label>
                        <input type="text" value="" name="kondisi" class="form-control" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script></script>
