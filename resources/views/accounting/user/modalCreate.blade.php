  <div class="modal fade" id="modalUserBaru" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <form action="/acc/user" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="modal-header">
                      <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $namaRoleDipilih }} baru</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body p-5">

                      <div class="col-sm-12 mb-2">
                          <label for="">Nama depan</label>
                          <input type="text" name="nama_depan" class="form-control" required>
                      </div>

                      <div class="col-sm-12 mb-2">
                          <label for="">Nama belakang</label>
                          <input type="text" name="nama_belakang" class="form-control" required>
                      </div>

                      <div class="col-sm-12 mb-2">
                          <label for="">Email</label>
                          <input type="email" name="email" class="form-control" required>
                      </div>

                      @if ($idRoleDipilih == 'all')
                          <div class="col-sm-12 mb-2">
                              <label for="">Role</label>
                              <select name="id_role" class="form-select">
                                  @foreach ($listRole as $role)
                                      <option value="{{ $role->id }}">{{ $role->nama }}</option>
                                  @endforeach
                              </select>
                          </div>
                      @else
                          <input type="hidden" name="id_role" value="{{ $idRoleDipilih }}">
                      @endif



                      <div class="col-sm-12 mb-2">
                          <label for="">Telepon</label>
                          <input type="tel" name="telepon" class="form-control" required>
                      </div>

                      <div class="col-sm-12 mb-2">
                          <label for="">Password</label>
                          <input type="password" name="password" class="form-control" required>
                      </div>

                      <div class="col-sm-12 mb-2">
                          <label for="">Konfirmasi password</label>
                          <input type="password" name="konfirmasi_password" required class="form-control">
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
