<div class="modal fade" id="modalDeleteRekening{{ $rekening->id }}" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">


        <div class="modal-content">
            <div class="modal-header">
                Hapus rekening atas nama {{ $rekening->atas_nama }} ?
            </div>
            <div class="modal-body">

                <div class="">
                    <p class="fw-bold text-danger">
                        Penghapusan rekening dapat menyebabkan error pada transaksi yang telah berlalu!
                    </p>

                    <p>
                        Fitur ini sengaja di non-aktifkan. Jika rekening memang tidak terpakai, hubungi developer untuk
                        menghapusnya dari database.
                    </p>
                </div>

            </div>

        </div>

    </div>
</div>
