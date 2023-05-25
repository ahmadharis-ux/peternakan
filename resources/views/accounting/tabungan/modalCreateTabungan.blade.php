<div class="modal fade" id="modalCreateTabungan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="/acc/tabungan" method="post" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tabungan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mt-2 px-5">

                        <div class="col">

                            <div class="col-sm-12">
                                <label for="">Sumber Dana</label>
                                <select name="id_rekening" class="form-select mb-3">
                                    @foreach ($listRekening as $rekening)
                                        <option value="{{ $rekening->id }}">
                                            <span>{{ $rekening->bank }}</span>
                                            <span>a.n</span>
                                            <span>{{ $rekening->atas_nama }}</span>
                                            <span>{{ $rekening->nomor_rekening }}</span>

                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-12">
                                <label for="">Untuk</label>
                                <select required name="id_pihak_kedua" id="" class="form-select mb-3">
                                    <option disabled selected value>-- Pilih owner --</option>
                                    @foreach ($listOwner as $owner)
                                        <option value="{{ $owner->id }}">{{ $owner->nama_depan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-12">
                                <label for="">Keterangan</label>
                                <textarea required name="keterangan" class="form-control mb-3" placeholder="keterangan" id="" cols="30"
                                    rows="3"></textarea>
                            </div>


                            <div class="col-sm-12">
                                <label for="">Nominal</label>
                                <input type="number" class="form-control mb-3" name="nominal" required>
                            </div>


                            <div class="col-sm-6 mb-3">
                                <label for="">Biaya admin</label>
                                <input type="number" min="0" class="form-control mb-3" name="adm">
                            </div>

                        </div>

                        {{-- info bank --}}
                        <div class="col d-flex flex-column">
                            <div class="d-flex flex-row justify-content-between">
                                <div class="text-secondary">Bank</div>
                                <div id="namaBank"></div>
                            </div>

                            <div class="d-flex flex-row justify-content-between">
                                <div class="text-secondary">Atas nama</div>
                                <div id="atasNama"></div>
                            </div>

                            <div class="d-flex flex-row justify-content-between">
                                <div class="text-secondary">Nomor rekening</div>
                                <div id="nomorRekening"></div>
                            </div>

                            <div class="d-flex flex-row justify-content-between mb-5">
                                <div class="text-secondary">Saldo</div>
                                <div id="saldo"></div>
                            </div>
                        </div>



                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="btnSimpan" type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        const btnSimpan = $("#btnSimpan")
        const inputNominal = $("input[name=nominal]")

        const listRekening = {!! $listRekening !!}
        const firstRekening = listRekening[0]

        let currentRekening;

        function setSelectedRekening(rekening) {
            currentRekening = rekening;

            $("#namaBank").text(rekening.bank)
            $("#atasNama").text(rekening.atas_nama)
            $("#nomorRekening").text(rekening.nomor_rekening)

            const saldo = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                separator: ','
            }).format(rekening.saldo);

            $("#saldo").text(saldo)
        }

        setSelectedRekening(firstRekening)

        $("select[name=id_rekening]").change(function() {
            const selectedRekeningId = $(this).val()
            const selectedRekening = listRekening.find((rekening) => rekening.id == selectedRekeningId)

            setSelectedRekening(selectedRekening)
        })

        inputNominal.keyup(function() {
            const nominal = parseInt($(this).val())

            const invalidNominal = nominal > currentRekening.saldo || nominal > sisaPembayaran

            if (invalidNominal) {
                btnSimpan.attr('disabled', 'disabled')
                btnSimpan.text('Nominal tidak valid!')

                inputNominal.addClasss('is-invalid')
            } else {
                btnSimpan.removeAttr('disabled')
                btnSimpan.text('Simpan')

                inputNominal.removeClass('is-invalid')
            }
        })
    })
</script>
