  <div class="modal fade" id="modalEditKodeJurnalBaru{{$kodejurnal->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <form action="/acc/kodejurnal/{{$kodejurnal->id}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                  @csrf
                  <div class="modal-header">
                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Kas Hutang</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body">
                      <div class="col-sm-12 mb-2">
                          <label for="">Kode Jurnal</label>
                          <input type="text" name="kode" class="form-control" value="{{$kodejurnal->kode}}">
                      </div>
                      <div class="col-sm-12 mb-2">
                          <label for="">Keterangan</label>
                          <input type="text" name="keterangan" class="form-control" value="{{$kodejurnal->keterangan}}">
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
