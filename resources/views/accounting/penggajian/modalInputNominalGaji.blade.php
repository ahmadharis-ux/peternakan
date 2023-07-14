<div class="modal fade" id="modalInputNominalGaji" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Gaji bulan ini
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="/acc/gaji" method="post" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id_pihak_kedua" value="{{ $pekerja->id }}">




                <div class="modal-body p-5">

                    <p class="fs-4">
                        <span>Pekerja:</span>
                        <span class="fw-bold">{{ $pekerja->fullname() }}</span>
                    </p>

                    <div class="col-sm-12">
                        <label for="">Nominal</label>
                        <input type="number" class="form-control mb-3" name="nominal">
                    </div>

                    <div class="col-sm-12">
                        <label for="">Keterangan</label>
                        <textarea required name="keterangan" class="form-control mb-3" placeholder="keterangan" id="" cols="30"
                            rows="10"></textarea>
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
