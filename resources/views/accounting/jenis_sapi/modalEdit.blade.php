<div class="modal fade" id="modalEditJenisSapi-{{ $jenisSapi->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="/acc/jenis_sapi/{{ $jenisSapi->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="hidden" name="id_jenisSapi" value="{{ $jenisSapi->id }}">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">JenisSapi baru</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-5">

                    <div class="col-sm-12 mb-3">
                        <label for="">Nama jenis sapi</label>
                        <input type="text" class="form-control" name="nama" value="{{ $jenisSapi->nama }}"
                            required>
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
