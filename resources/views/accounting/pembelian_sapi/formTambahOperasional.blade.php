 <form action="/acc/hutang/operasional" method="post">
     @csrf
     <input type="hidden" name="id_pembelian_sapi" value="{{ $pembelianSapi->id }}">
     <div class="row mt-2">
         <div class="col-sm-5 mb-3">
             <label for="">Keterangan</label>
             <input type="text" class="form-control" name="keterangan">
         </div>
         <div class="col-sm-5 mb-3">
             <label for="">Nominal Operasional</label>
             <input type="number" min="0" class="form-control" name="harga">
         </div>
         <div class="col-sm-2 mb-3">
             <br>
             <button type="submit" class="btn btn-sm btn-primary">+</button>
         </div>
     </div>
 </form>
