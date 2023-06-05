<div class="modal fade" id="modalCetakFaktur" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="#cetak-faktur" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" readonly class="form-control" value="{{ $penjualanSapi->debit->id }}"
                    name="id_debit">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Cetak faktur penjualan sapi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5">
                    <div>
                        <label for="">Subjek faktur</label>
                        <input type="text" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>
