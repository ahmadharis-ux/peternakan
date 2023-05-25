x  <div class="modal fade" id="modalCreatePrive" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <form action="/acc/prive/" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Prive</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-5">
                <div class="col-sm-12">
                    <label for="">Sumber Dana</label>
                    <select name="id_rekening" id="" class="form-select">
                        <option value="">-- Pilih Sumber Dana --</option>
                        @foreach ($ListRek as $rek)
                        <option value="{{$rek->id}}">{{$rek->nomor_rekening}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-12">
                    <label for="">Owner</label>
                    <select name="id_pihak_kedua" id="" class="form-select">
                        <option value="">-- Pilih Owner --</option>
                        @foreach ($ListOwner as $owner)
                        <option value="{{$owner->id}}">{{$owner->email}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-12">
                    <label for="">Keterangan</label>
                    <textarea required name="keterangan" class="form-control" placeholder="keterangan" id="" cols="30"
                        rows="10"></textarea>
                </div>
                <div class="col-sm-12">
                    <label for="">Nominal</label>
                    <input type="number" class="form-control" name="nominal">
                </div>
                <div class="col-sm-12">
                    <label for="">Admin Transfer</label>
                    <input type="number" class="form-control" name="adm">
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
