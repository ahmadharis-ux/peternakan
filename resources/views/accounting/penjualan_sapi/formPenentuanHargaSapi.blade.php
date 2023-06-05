   <form action="/acc/piutang/detail" method="post" enctype="multipart/form-data" id="formPenentuanHarga">
       @csrf
       <input type="hidden" name="id_penjualan_sapi" value="{{ $penjualanSapi->id }}">
       <input type="hidden" name="id_sapi" class="form-control">

       <p class="mb-3 fw-bold">Informasi sapi</p>


       {{-- jenis sapi --}}
       <div class="row mb-3">
           <div class="col">
               <label for="">Jenis sapi</label>
               <input disabled type="text" class="form-control" id="iJenisSapi">
           </div>
       </div>

       {{-- jenis kelamin sapi  --}}
       <div class="row mb-3">
           <div class="col">
               <label for="">Jenis kelamin sapi</label>
               <input disabled type="text" class="form-control" id="iJenisKelaminSapi">

           </div>
       </div>

       {{-- eartag dan bobot --}}
       <div class="row mb-3">
           <div class="col">
               <label for="">Eartag</label>
               <input disabled type="text" name="eartag" class="form-control" id="iEartag">
           </div>

           <div class="col">
               <label for="">Bobot awal (kg)</label>
               <input type="number" min="0" id="iBobotAwal" class="form-control number-only" disabled>
           </div>
       </div>


       <div class="col mb-3">
           <label for="">Harga pokok</label>
           <input type="number" min="0" id="iHargaPokok" class="form-control number-only" disabled>
       </div>

       <div class="col mb-3">
           <label for="">Bobot saat ini (kg)</label>
           <input type="number" min="0" name="bobot" class="form-control number-only" required>
       </div>


       {{-- opsi penjualan --}}
       <div class="row mb-3 mx-1 p-3 rounded border">
           <p>Opsi penjualan</p>
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
                        <input disabled type="text" value="" name="kondisi" class="form-control" list="listKondisi"
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


       <div>
           <input type="submit" id="btnSubmitPenjualanSapi" class="btn btn-primary" disabled>
       </div>
   </form>

   <script>
       $(document).ready(function() {
           const radioOpsiBeli = $("input[name=opsi_beli]")
           const inputTotalHarga = $("input[name=total_harga]")
           const inputHargaKiloan = $("input[name=kiloan]")
           const inputBobot = $("input[name=bobot]")

           let opsiBeli = 'ekoran';

           function beliKiloan() {
               opsiBeli = 'kiloan'
               inputTotalHarga.attr('readonly', 'readonly')
               inputHargaKiloan.removeAttr('disabled')

               inputTotalHarga.val(inputBobot.val() * inputHargaKiloan.val())
           }

           function beliEkoran() {
               opsiBeli = 'ekoran';
               inputHargaKiloan.val('')
               inputHargaKiloan.attr('disabled', 'disabled')

               inputTotalHarga.removeAttr('readonly')
               inputTotalHarga.val()
           }

           radioOpsiBeli.click(function() {
               const value = $(this).val()

               if (value === 'kiloan') {
                   beliKiloan();
               } else {
                   beliEkoran();
               }
           })

           function updateHargaTotal() {
               const totalHarga = inputHargaKiloan.val() * inputBobot.val()
               inputTotalHarga.val(totalHarga)
           }

           inputHargaKiloan.keyup(updateHargaTotal)
           inputBobot.keyup(updateHargaTotal)
       })
   </script>
