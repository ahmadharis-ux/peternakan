@extends('layouts.main')
@section('container')
    <section class="section dashboard">

        <form action="/acc/pemakaian_pakan" method="post">
            @csrf

            {{-- table pakan --}}
            <div class="card recent-sales overflow-auto">
                <div class="card-body p-3">

                    <div class="d-flex flex-row">
                        <div class="d-flex flex-column" style="width: 70%">
                            {{-- Pilih pakan --}}
                            @include('accounting.pemakaian_pakan.tableListStokPakan')

                            <div class="my-5">
                                <hr>
                            </div>

                            {{-- table pilih sapi --}}
                            @include('accounting.pemakaian_pakan.tablePilihSapi')

                        </div>

                        @include('accounting.pemakaian_pakan.tableInfoPemakaianPakan')
                    </div>

                    <input type="hidden" name="markup">
                    <input type="hidden" name="markup_bulat">

                    <div class="d-flex justify-content-end">
                        <input class="btn btn-primary mt-3" type="submit" value="Simpan" disabled>
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
                    console.log(stok)
                    $(`#inputQty-${idStok}`).removeAttr('disabled')
                    $(`#nominalStokPakan-${idStok}`).text('0')
                    stok.qty = 0;
                    stok.nominal = 0;

                    stokDipilih.push(stok)
                } else {
                    console.log('tidak checked')
                    $(`#inputQty-${idStok}`).attr('disabled', 'disabled')
                    $(`#inputQty-${idStok}`).val('')
                    $(`#nominalStokPakan-${idStok}`).text('-')

                    stokDipilih = stokDipilih.filter((stok) => stok.id !== idStok)
                }

                updateMarkup()
            }

            function handleChangeQty(evt) {
                const idStok = $(this).data('id-stok')
                let stok = stokDipilih.find((s) => s.id == idStok)
                const indexStok = stokDipilih.findIndex((s) => s.id == idStok)


                const maxQty = stok.stok

                let input = $(this).val()

                if (input > maxQty) {
                    $(this).val(maxQty)
                    input = maxQty
                }

                nominal = input * stok.harga
                stokDipilih[indexStok].nominal = nominal;

                const formattedNumber = nominal.toLocaleString('id-ID', formatNumberOption);

                $(`#nominalStokPakan-${idStok}`).text(formattedNumber)

                const formatTotal = getSumNominal().toLocaleString('id-ID', formatNumberOption)
                $("#totalNilaiPakan").text(formatTotal)

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
                console.log(pekerja)

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
                const markupPembulatan = bulat(markup)
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
