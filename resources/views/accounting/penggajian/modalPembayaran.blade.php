@php
    // kredit
    $totalKredit = $kreditPenggajian->nominal;
    
    // pembayaran
    $totalBayar = $listRiwayatTransaksi->sum('nominal');
    $sisaPembayaran = $totalKredit - $totalBayar;
@endphp

<div class="modal fade" id="modalPembayaranGaji" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="/acc/gaji/transaksi" method="post" enctype="multipart/form-data">
                @csrf

                <input type="hidden" readonly class="form-control" value="{{ $kreditPenggajian->id }}"
                    name="id_kredit">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Pembayaran gaji {{ $pekerja->fullname() }}
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mt-2 px-5">



                        <div class="col">
                            <div class="col-sm-12 mb-3">
                                <label for="">Rekening</label>
                                <select name="id_rekening" class="form-select">
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

                            <div class="col-sm-12 mb-3">
                                <label for="">Nominal</label>
                                <div class="d-flex">
                                    <input id="inputNominal" type="number" min="0" max="{{ $sisaPembayaran }}"
                                        class="form-control" name="nominal" required>

                                    {{-- tombol input nominal sisa bayar. TUNDA JANG FITUR TAMBAHAN --}}
                                    {{-- <button id="nominalLunas" class="btn btn-success ms-1">Lunasi</button> --}}
                                </div>
                            </div>


                            <div class="col-sm-6 mb-3">
                                <label for="">Biaya admin</label>
                                <input type="number" min="0" class="form-control" name="adm">
                            </div>

                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Keterangan</label>
                                <textarea class="form-control" name="keterangan"cols="30" rows="5"></textarea>
                            </div>
                        </div>

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

                            <div class="d-flex justify-content-between mb-5 flex-row">
                                <div class="text-secondary">Total Pengeluaran</div>
                                <div id="totalPengeluaran">0</div>
                            </div>

                            <div class="d-flex justify-content-between fw-bold flex-row">
                                <div class="text-secondary">Sisa pembayaran</div>
                                <div>Rp {{ number_format($sisaPembayaran) }}</div>
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
        const inputNominal = $("#inputNominal")
        const inputAdm = $("input[name=adm]")

        const listRekening = {!! $listRekening !!}
        const firstRekening = listRekening[0]
        const sisaPembayaran = parseInt({!! $sisaPembayaran !!})

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
