  <div class="modal fade" id="modalRekeningBaru" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">



              <form action="/owner/rekening" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="modal-header">
                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Rekening baru</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body px-5">

                      <div class="col-sm-12 mb-2">
                          <label for="">Nomor rekening</label>
                          <input type="number" name="nomor_rekening" class="form-control">
                      </div>

                      <div class="col-sm-12 mb-2">
                          <label for="">Atas nama</label>
                          <input type="text" name="atas_nama" class="form-control">

                      </div>

                      <div class="col-sm-12 mb-2">
                          <label for="">Bank</label>
                          <input type="text" name="bank" class="form-control">

                      </div>


                      <div class="col-sm-12 mb-2">
                          <label for="">Saldo awal</label>
                          <input type="number" name="saldo_awal" class="form-control">
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
