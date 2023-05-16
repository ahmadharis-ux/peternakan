 <div class="modal fade" id="modalPembayaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <form action="/storetrans" method="post" enctype="multipart/form-data">
                 @csrf
                 <div class="modal-header">
                     <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal Pembayaran</h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <div class="row mt-2">
                         <div class="col-sm-12 mb-3">
                             <label for="">Keterangan</label>
                             <input type="text" class="form-control" name="ket" required>
                             <input type="hidden" class="form-control" value="" name="kas_id">
                             {{-- <input type="hidden" class="form-control" value="{{ auth()->user()->name }}"
                                 name="author"> --}}
                         </div>
                         <div class="col-sm-12 mb-3">
                             <label for="">Kredit</label>
                             <input type="number" class="form-control" name="kredit" required>
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
