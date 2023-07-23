@extends('layouts.main')
@section('container')
    <section class="section dashboard">

        <form action="/acc/pemakaian_pakan" method="post">
            @csrf

            <div class="card recent-sales overflow-auto">
                <div class="card-body p-3">

                    <div class="d-flex flex-row">
                        <div class="d-flex flex-column" style="width:100%">
                            {{-- Pilih pakan --}}
                            @include('accounting.pemakaian_pakan.tableListStokPakan')
                        </div>


                    </div>
                </div>
            </div>

            </div>

            <div class="d-flex justify-content-between flex-row">

                {{-- table pilih sapi --}}
                <div class="card recent-sales overflow-auto">
                    <div class="card-body p-3">
                        @include('accounting.pemakaian_pakan.tablePilihSapi')
                    </div>
                </div>

                <div style="width: 50%" class="d-flex flex-column">
                    <div>

                    </div>

                    <div class="card recent-sales overflow-auto">
                        <div class="card-body p-3">
                            <h5>Pilih pekerja</h5>

                            <div style="background: transparent" class="mb-3">
                                <select name="id_pekerja" class="form-select" required value>
                                    <option disabled selected>-- Pilih pekerja --</option>
                                    @foreach ($listPekerja as $pekerja)
                                        <option value="{{ $pekerja->id }}">{{ $pekerja->fullname() }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="card recent-sales overflow-auto">
                        <div class="card-body p-3">
                            <h5>Ringkasan</h5>
                            @include('accounting.pemakaian_pakan.tableInfoPemakaianPakan')

                            <input type="hidden" name="total_pengeluaran">
                            <input type="hidden" name="markup">
                            <input type="hidden" name="markup_bulat">

                            <div class="d-flex justify-content-end">
                                <input class="btn btn-primary mt-3" type="submit" value="Simpan" disabled>
                            </div>
                        </div>
                    </div>
                </div>



            </div>




            </div>

            </div>

        </form>

    </section>

    {{-- olab --}}
    <script>
        $(document).ready(function() {
            const formatNumberOption = {
                style: 'currency',
                currency: 'IDR',
                maximumFractionDigits: 0,
                toLocaleString: function(number) {
                    return number.replace(/\./g, ',');
                }
            }

            function number_format(number) {
                return number.toLocaleString('id-ID', formatNumberOption)
            }

            const listStokPakan = {!! $listStokPakan !!}
            const cbPilih = $(".cbPilihStokPakan")
            const inputSetQty = $(".inputSetQty")

            let stokDipilih = []


            function getSumNominal() {
                let totalNominal = 0;
                stokDipilih.forEach((stok) => {
                    totalNominal += stok.nominal
                })
                return totalNominal;
            }

            function handleTogglePakan(evt) {
                const isChecked = this.checked
                const idStok = $(this).data('id-stok')
                let stok = listStokPakan.find((stok) => stok.id == idStok)

                if (isChecked) {
                    $(`#inputQty-${idStok}`).removeAttr('disabled')
                    $(`#nominalStokPakan-${idStok}`).text('0')
                    stok.qty = 0;
                    stok.nominal = 0;

                    stokDipilih.push(stok)
                } else {
                    $(`#inputQty-${idStok}`).attr('disabled', 'disabled')
                    $(`#inputQty-${idStok}`).val('')
                    $(`#nominalStokPakan-${idStok}`).text('-')
                    $(`#input-nominal-pakan-${idStok}`).attr('disabled', 'disabled')


                    stokDipilih = stokDipilih.filter((stok) => stok.id !== idStok)
                }

                updateMarkup()
            }

            function handleChangeQty(evt) {
                const idStok = $(this).data('id-stok')
                let stok = stokDipilih.find((s) => s.id == idStok)
                const indexStok = stokDipilih.findIndex((s) => s.id == idStok)


                const maxQty = stok.stok

                let input = parseInt($(this).val());

                if (input > maxQty) {
                    $(this).val(maxQty)
                    input = maxQty
                }

                if (input < 1 || isNaN(input)) {
                    $(this).val()
                    input = 0
                }

                nominal = input * stok.harga
                $(`#input-nominal-pakan-${idStok}`).removeAttr('disabled')
                $(`#input-nominal-pakan-${idStok}`).val(nominal)


                stokDipilih[indexStok].nominal = nominal;

                const formattedNumber = nominal.toLocaleString('id-ID', formatNumberOption);

                $(`#nominalStokPakan-${idStok}`).text(formattedNumber)

                const formatTotal = getSumNominal().toLocaleString('id-ID', formatNumberOption)
                $("#totalNilaiPakan").text(formatTotal)
                $("input[name=total_pengeluaran]").val(getSumNominal())


                updateMarkup()
            }

            $(inputSetQty).keyup(handleChangeQty)
            $(inputSetQty).change(handleChangeQty)
            $(cbPilih).change(handleTogglePakan)

            // ==================================

            const listSapi = {!! $listSapi !!}
            const cbSapi = $(".cbSapi")
            let sapiDipilih = []

            function getCountSapi() {
                return sapiDipilih.length
            }

            function handleToggleSapi(evt) {
                const isChecked = this.checked
                const idSapi = $(this).data('id-sapi')
                const sapi = listSapi.find((s) => s.id == idSapi)


                if (isChecked) {
                    sapiDipilih.push(sapi)

                } else {
                    sapiDipilih = sapiDipilih.filter((sapi) => sapi.id !== idSapi)
                }

                $("#totalSapi").text(sapiDipilih.length)
                updateMarkup()
            }

            $(cbSapi).change(handleToggleSapi)



            // ================================================================


            $("select[name=id_pekerja]").change(function() {
                validate()
            })

            // =====================
            function bulat(number) {
                return number;
            }

            function validate() {
                const markup = $("input[name=markup]").val()

                const pekerja = $("select[name=id_pekerja]").val()
                // console.log(pekerja)

                const valid = markup > 0 && pekerja != null

                if (valid) {
                    $("input[type=submit]").removeAttr('disabled')
                } else {
                    $("input[type=submit]").attr('disabled', 'disabled')

                }
            }

            function updateMarkup() {
                let markup
                if (getCountSapi() < 1) {
                    markup = 0
                } else {
                    markup = getSumNominal() / getCountSapi();

                }

                $("#markupPerSapi").text(number_format(markup))
                const markupPembulatan = Math.ceil(markup / 1000) * 1000
                $("#markupPembulatan").text(number_format(markupPembulatan))

                $("input[name=markup]").val(markup)
                $("input[name=markup_bulat]").val(markupPembulatan)

                validate()

            }
        })
    </script>


    {{-- modals --}}
    {{-- modal pilih pakan --}}
    {{-- modal pilih sapi --}}

    {{-- teu make modal --}}
@endsection
