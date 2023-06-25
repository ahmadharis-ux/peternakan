<div class="modal fade" id="modalCetakFaktur" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="/acc/hutang/{{ $pembelianSapi->id }}/invoice" method="post" enctype="multipart/form-data">
                @csrf

                <input type="hidden" readonly class="form-control" value="{{ $pembelianSapi->kredit->id }}"
                    name="id_kredit">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Cetak faktur pembelian sapi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5">
                    <div class="mb-3">
                        <label for="">Subjek faktur</label>
                        <input type="text" name="subjek" value="contoh_subjek_faktur" class="form-control" required>
                    </div>

                    <div>
                        <label for="">Jatuh tempo</label>
                        <input type="date" value="today" name="jatuh_tempo" class="form-control" required>
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
