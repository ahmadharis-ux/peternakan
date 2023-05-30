<div class="modal fade" id="modalPilihSapi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Pilih sapi untuk dijual</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex flex-row justify-content-between p-3">

                    {{-- table list sapi --}}
                    <div class="px-3" style="width: 70%; min-height: 110%">
                        <div class="sticky-top">
                            @include('accounting.penjualan_sapi.tableListSapi')
                        </div>
                    </div> 

                    {{-- form penentuan harga --}}
                    <div class="border rounded p-3" style="width:30;">
                        @include('accounting.penjualan_sapi.formPenentuanHargaSapi')
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>

{{-- <script>
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
</script> --}}
