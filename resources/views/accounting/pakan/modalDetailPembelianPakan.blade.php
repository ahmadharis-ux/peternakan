<!-- Modal -->
<div class="modal fade" id="modalCreateDetailPembelianPakan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pakan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/acc/pakan/detail" method="post">
            @csrf
            <div class="modal-body">
                <div class="mb-2">
                    <label for="">Nama Pakan</label>
                    <select name="id_pakan" id="" class="form-select">
                        <option value="">-- Pilih Pakan --</option>
                        @foreach ($ListPakan as $pakan)
                        <option value="{{$pakan->id}}">{{$pakan->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Pilih Satuan</label>
                    @foreach ($ListSatuan as $satuan)       
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="id_satuan_pakan" value="{{$satuan->id}}" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                          {{$satuan->nama}}
                        </label>
                    </div>
                    @endforeach
                </div>
                <div class="mb-2">
                    <div class="row">
                        <div class="col-8">
                            <label for="">Harga Satuan</label>
                            <input type="number" name="harga" class="form-control">
                        </div>
                        <div class="col">
                            <label for="">Quantity</label>
                            <input type="number" name="qty" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan">
                </div>
                {{-- <div class="mb-2">
                    <label for="">Total Harga</label>
                    <input type="text" class="form-control" name="subtotal">
                </div> --}}
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>