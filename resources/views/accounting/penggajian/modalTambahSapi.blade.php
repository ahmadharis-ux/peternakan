<div class="modal fade" id="modalTambahSapi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <form action="/acc/hutang/detail" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_pembelian_sapi" value="{{ $pembelianSapi->id }}" class="form-control">


                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah sapi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-5">

                    {{-- jenis sapi --}}
                    <div class="row mb-3">
                        <div class="col">
                            <label for="">Jenis sapi</label>
                            <select name="id_jenis_sapi" class="form-select">
                                @foreach ($listJenisSapi as $jenisSapi)
                                    <option value="{{ $jenisSapi->id }}">{{ $jenisSapi->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- jenis kelamin sapi  --}}
                    <div class="row mb-3">
                        <div class="col">
                            <label for="">Jenis kelamin sapi</label>
                            <select name="jenis_kelamin" class="form-select">
                                <option value="jantan" selected>Pejantan</option>
                                <option value="betina">Betina</option>
                            </select>
                        </div>
                    </div>

                    {{-- eartag dan bobot --}}
                    <div class="row mb-3">
                        <div class="col">
                            <label for="">Eartag</label>
                            <input type="text" name="eartag" value="A5" class="form-control" required>
                        </div>

                        <div class="col">
                            <label for="">Bobot (kg)</label>
                            <input type="number" min="0" name="bobot" value="100"
                                class="form-control number-only" required>
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
                        <input type="number" min="0" name="total_harga" class="form-control number-only"
                            required>
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

        </div>
    </div>
</div>

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
