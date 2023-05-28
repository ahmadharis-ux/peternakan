<!-- Modal -->
<div class="modal fade" id="modalCreateKreditPakan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Satuan Pakan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/acc/pakan/pembelian" method="post">
            @csrf
            <div class="modal-body">
                <label for="">Nama Supplier Pakan</label>
                <select name="id_pihak_kedua" id="" class="form-select">     
                  <option value="">-- Supplier Pakan -- </option>
                  @foreach ($ListSupplierPakan as $supplier)
                       <option value="{{$supplier->id}}">{{$supplier->nama_depan}}</option> 
                  @endforeach
                </select>
                <div class="col-sm-12">
                  <label for="">Keterangan</label>
                  <textarea required name="keterangan" class="form-control" placeholder="keterangan" id="" cols="30"
                      rows="10">asdfadf</textarea>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>