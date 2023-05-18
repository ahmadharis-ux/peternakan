<div class="modal fade" id="piutang" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="/storekas" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Kas Piutang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12">
                        <label for="">Customer</label>
                        <input type="hidden" name="jurnal_id" value="{{ 2 }}" required>
                        <input type="hidden" name="author" value="{{ auth()->user()->name }}" required>
                        <select name="user_id" id="" class="form-select">
                            @foreach ($cust as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <label for="">Keterangan</label>
                        <textarea required name="keterangan" class="form-control" placeholder="keterangan" id="" cols="30" rows="10"></textarea>
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
