<div class="modal fade" id="modalCreatePrive" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="/acc/prive" method="post" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Prive</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mt-2 px-5">

                        {{-- inputs --}}
                        <div class="col">

                            <div class="col-sm-12">
                                <label for="">Sumber Dana</label>
                                <select name="id_rekening" class="form-select mb-3">
                                    @foreach ($listRekening as $rekening)
                                        <option value="{{ $rekening->id }}">
                                            <span>{{ $rekening->bank }}</span>
                                            <span>&nbsp</span>
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
                                        <option value="{{ $owner->id }}">{{ $owner->fullname() }}</option>
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
                            <div class="d-flex justify-content-between flex-row">
                                <div class="text-secondary">Bank</div>
                                <div id="namaBank"></div>
                            </div>

                            <div class="d-flex justify-content-between flex-row">
                                <div class="text-secondary">Atas nama</div>
                                <div id="atasNama"></div>
                            </div>

                            <div class="d-flex justify-content-between flex-row">
                                <div class="text-secondary">Nomor rekening</div>
                                <div id="nomorRekening"></div>
                            </div>

                            <div class="d-flex justify-content-between mb-5 flex-row">
                                <div class="text-secondary">Saldo</div>
                                <div id="saldo"></div>
                            </div>

                            <div class="d-flex justify-content-between flex-row">
                                <div class="text-secondary">Nominal pengeluaran</div>
                                <div id="nominalPengeluaran">0 </div>
                            </div>

                            <div class="d-flex justify-content-between flex-row">
                                <div class="text-secondary">Adm</div>
                                <div id="nominalAdm">0</div>
                            </div>

                            <div class="d-flex justify-content-between flex-row">
                                <div class="text-secondary">Total Pengeluaran</div>
                                <div id="totalPengeluaran">0</div>
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
        const inputAdm = $("input[name=adm]")

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

        function setDisplayAngka(nominal, adm) {

            $total = `Rp ${nominal+adm}`;

            $("#nominalPengeluaran").text(nominal)
            $("#nominalAdm").text(adm)
            $("#totalPengeluaran").text($total)
        }

        function validasiNominalDanAdm() {
            let nominal = parseInt($(inputNominal).val())
            let adm = parseInt($(inputAdm).val())

            console.log(nominal);

            if (isNaN(nominal)) {
                nominal = 0
            }
            if (isNaN(adm)) {
                adm = 0
            }

            setDisplayAngka(nominal, adm);


            const totalNominal = nominal + adm;

            const nominalKosong = nominal < 1
            const pengeluaranKegedeanBro = totalNominal > currentRekening.saldo
            const invalidAtuh = nominalKosong || pengeluaranKegedeanBro;

            console.log({
                '1 nominalKosong': nominalKosong,
                '2 kegedean': pengeluaranKegedeanBro,
                '3 invalid': invalidAtuh,
            });


            if (invalidAtuh) {
                btnSimpan.attr('disabled', 'disabled')
                btnSimpan.text('Nominal tidak valid!')

                $("#totalPengeluaran").addClass('text-danger')


                // fitur tambahan jang ngke. wkwkw
                // inputNominal.addClass('is-invalid')

                return console.log('invalid');
            }

            console.log('valid');
            btnSimpan.removeAttr('disabled')
            btnSimpan.text('Simpan')
            $("#totalPengeluaran").removeClass('text-danger')

            // inputNominal.removeClass('is-invalid')
        }


        // inisialisasi
        setSelectedRekening(firstRekening)
        validasiNominalDanAdm()

        // listeners
        inputNominal.change(validasiNominalDanAdm)
        inputNominal.keyup(validasiNominalDanAdm)
        inputAdm.change(validasiNominalDanAdm)
        inputAdm.keyup(validasiNominalDanAdm)

        // ganti rekening
        $("select[name=id_rekening]").change(function() {
            const selectedRekeningId = $(this).val()
            const selectedRekening = listRekening.find((rekening) => rekening.id == selectedRekeningId)

            setSelectedRekening(selectedRekening)
            validasiNominalDanAdm()
        })


    })
</script>
