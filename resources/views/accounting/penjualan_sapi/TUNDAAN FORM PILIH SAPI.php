  <form action="/acc/piutang/detail" method="post" enctype="multipart/form-data">
  	@csrf
  	<input type="hidden" name="id_pembelian_sapi" value="{{ $penjualanSapi->id }}" class="form-control">

  	<div class="modal-header">
  		<h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah sapi</h1>
  		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  	</div>

  	<div class="modal-body p-5">


  		{{-- eartag dan bobot --}}
  		<div class="row mb-3">

  			<div class="col">
  				<label for="">Bobot (kg)</label>
  				<input type="number" min="0" name="bobot" value="100" class="form-control number-only" required>
  			</div>
  		</div>


  		{{-- opsi pembelian --}}
  		<div class="row mb-3 mx-1 p-3 rounded" style="border: 1px grey solid">
  			<p>Opsi pembelian</p>
  			<div class="col d-flex justify-content-center flex-column align-items-center">
  				<label for="">Per ekor</label>
  				<input type="radio" name="opsi_beli" value="ekoran" class="form-check-input" checked>
  			</div>

  			<div class="col d-flex justify-content-center flex-column align-items-center">
  				<label for="">Kiloan</label>
  				<input type="radio" name="opsi_beli" value="kiloan" class="form-check-input">
  			</div>
  		</div>

  		<div class="col mb-3">
  			<label for="">Harga per Kg</label>
  			<input type="number" min="0" name="kiloan" class="form-control number-only" disabled>
  		</div>

  		<div class="col-sm-12 mb-3">
  			<label for="">Total Harga</label>
  			<input type="number" min="0" name="total_harga" class="form-control number-only" required>
  		</div>

  		{{-- Kondisi --}}
  		{{-- <div class="col-sm-12 mb-3">
                        <label for="">Kondisi</label>
                        <input type="text" value="" name="kondisi" class="form-control" list="listKondisi"
                            required>
                        <datalist id="listKondisi">
                            <option value="Sempurna">Sempurna</option>
                            <option value="Normal">Normal</option>
                            <option value="Cacat">Cacat</option>
                        </datalist>
                    </div> --}}

  		<div class="col-sm-12 mb-3">
  			<label for="">Keterangan</label>
  			<textarea name="keterangan" class="form-control" id="" cols="30" rows="10" required></textarea>
  		</div>


  	</div>

  	<div class="modal-footer">
  		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
  		<button type="submit" class="btn btn-primary">Simpan</button>
  	</div>
  </form>
