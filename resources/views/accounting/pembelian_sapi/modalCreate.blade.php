  <div class="modal fade" id="modalCreatePembelianSapi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">

              <form action="/acc/hutang/" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="modal-header">
                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Kas Hutang</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body p-5">
                      <div class="col-sm-12">
                          <label for="">Supplier Sapi</label>
                          <select name="id_pihak_kedua" id="" class="form-select">
                              @foreach ($listSupplierSapi as $supplier)
                                  <option value="{{ $supplier->id }}">{{ $supplier->fullname() }}
                                  </option>
                              @endforeach
                          </select>
                      </div>
                      <div class="col-sm-12">
                          <label for="">Keterangan</label>
                          <textarea required name="keterangan" class="form-control" placeholder="keterangan" id="" cols="30"
                              rows="10">asdfadf</textarea>
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
