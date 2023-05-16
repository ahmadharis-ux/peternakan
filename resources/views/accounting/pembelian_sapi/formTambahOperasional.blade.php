 <form action="/storeopr" method="post">
     @csrf
     <div class="row mt-2">
         <div class="col-sm-5 mb-3">
             <label for="">Keterangan</label>
             <input type="text" class="form-control" name="keterangan">
             <input type="hidden" class="form-control" value="" name="kas_id">
         </div>
         <div class="col-sm-5 mb-3">
             <label for="">Nominal Operasional</label>
             <input type="number" class="form-control" name="nominal">
         </div>
         <div class="col-sm-2 mb-3">
             <br>
             <button type="submit" class="btn btn-sm btn-primary">+</button>
         </div>
     </div>
 </form>
