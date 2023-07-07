<div class="modal fade" id="modalEditRekening{{ $rekening->id }}" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">



            <form action="/owner/rekening/{{ $rekening->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <input type="hidden" name="id_rekening" value="{{ $rekening->id }}">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Rekening baru</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body px-5">

                    <div class="col-sm-12 mb-2">
                        <label for="">Nomor rekening</label>
                        <input value="{{ $rekening->nomor_rekening }}" type="number" name="nomor_rekening"
                            class="form-control">
                    </div>

                    <div class="col-sm-12 mb-2">
                        <label for="">Atas nama</label>
                        <input value="{{ $rekening->atas_nama }}" type="text" name="atas_nama" class="form-control">

                    </div>

                    <div class="col-sm-12 mb-2">
                        <label for="">Bank</label>
                        <input value="{{ $rekening->bank }}" type="text" name="bank" class="form-control">

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
