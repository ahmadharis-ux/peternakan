 <div class="modal fade" id="modalPembayaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <form action="/acc/hutang/transaksi" method="post" enctype="multipart/form-data">
                 @csrf
                 <input type="hidden" readonly class="form-control" value="{{ $pembelianSapi->kredit->id }}"
                     name="id_kredit">
                 <div class="modal-header">
                     <h1 class="modal-title fs-5" id="staticBackdropLabel">Pembayaran Kredit</h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <div class="row mt-2 px-5">

                         {{-- <div class="col-sm-12 mb-3">
                             <label for="">Keterangan</label>
                             <input type="text" class="form-control" name="keterangan" required>
                         </div> --}}

                         <div class="col-sm-12 mb-3">
                             <label for="">Nominal</label>
                             <input type="number" min="0" class="form-control" name="nominal" required>
                         </div>

                         <div class="col-sm-12 mb-3">
                             <label for="">Rekening</label>
                             <select name="id_rekening" class="form-select">
                                 @foreach ($listRekening as $rekening)
                                     <option value="{{ $rekening->id }}">{{ $rekening->bank }} a.n
                                         {{ $rekening->atas_nama }} {{ $rekening->nomor_rekening }}</option>
                                 @endforeach
                             </select>
                         </div>

                         <div class="col-sm-6 mb-3">
                             <label for="">Biaya admin</label>
                             <input type="number" min="0" class="form-control" name="adm" required>
                         </div>

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
