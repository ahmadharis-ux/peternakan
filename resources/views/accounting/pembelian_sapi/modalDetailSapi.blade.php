<div class="modal fade" id="modalDetailSapi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="/storesapi" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal Produk</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="kas_id" value="" class="form-control">
                        <div class="col-sm-4 mb-3">
                            <label for="">Eartag</label>
                            <input type="text" name="eartag" value="" class="form-control" required>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label for="">Bobot</label>
                            <input type="number" name="bobot" value="" class="form-control" required>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label for="">Harga / Kg</label>
                            <input type="number" name="harga_kg" value="" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <label for="">Total Harga</label>
                        <input type="number" name="total_harga" value="" class="form-control" required>
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
