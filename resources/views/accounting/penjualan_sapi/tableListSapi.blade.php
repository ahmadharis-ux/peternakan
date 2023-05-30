<table id="example" class="display ">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Eartag</th>
            <th scope="col">Jenis</th>
            <th scope="col">Bobot</th>
            <th scope="col">Jenis kelamin</th>
            <th scope="col">Harga Pokok</th>
            <th scope="col"></th>

        </tr>
    </thead>
    <tbody>
        @foreach ($listSapi as $sapi)
            @php
                $markupPembulatan = $sapi->markupSapi->sum('markup_pembulatan');
            @endphp

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $sapi->eartag }}</td>
                <td>{{ $sapi->jenisSapi->nama }}</td>
                <td>{{ $sapi->bobot }} kg</td>
                <td>{{ $sapi->jenis_kelamin }}</td>
                <td>Rp {{ number_format($sapi->harga_pokok + $markupPembulatan) }}</td>
                <td>
                    <button class="btn btn-sm btn-primary btnPilihSapi" data-id-sapi="{{ $sapi->id }}">Pilih</button>
                </td>
            </tr>
        @endforeach

    <tbody>
</table>

<script>
    $(document).ready(function() {
        // form element
        const inputIdSapi = $("input[name=id_sapi]")
        const inputJenisSapi = $("#iJenisSapi")
        const inputJenisKelaminSapi = $("#iJenisKelaminSapi")
        const inputEartag = $("#iEartag")
        const inputBobotAwal = $("#iBobotAwal")
        const inputHargaPokok = $("#iHargaPokok")
        const inputKondisiAwal = $("#iKondisiAwal")
        // =========================== form element

        const btnPilihSapi = $(".btnPilihSapi");
        const formHarga = $("#formPenentuanHarga")

        const listSapi = {!! $listSapi !!};
        let sapiTerpilih

        function cancelInfoSapi() {
            formHarga.find('input').not('[type=radio], [type=submit] ').val('');
            // formHarga.text('')

        }

        function tampilInfoSapi(sapi) {
            let hargaPokok = sapiTerpilih.harga_pokok;
            let listMarkupSapi = sapiTerpilih.markup_sapi;
            let sumMarkup = 0;

            listMarkupSapi.forEach(markup => {
                sumMarkup += markup.markup_pembulatan;
            });

            sapiTerpilih.hargaAkhir = hargaPokok + sumMarkup;

            console.log(sapiTerpilih)
            inputIdSapi.val(sapiTerpilih.id)
            inputJenisSapi.val(sapiTerpilih.jenis_sapi.nama)
            inputJenisKelaminSapi.val(sapiTerpilih.jenis_kelamin)
            inputEartag.val(sapiTerpilih.eartag)
            inputBobotAwal.val(sapiTerpilih.bobot)
            inputKondisiAwal.val(sapiTerpilih.kondisi)
            inputHargaPokok.val(sapiTerpilih.hargaAkhir)
        }

        function cancelPilihSapi() {
            sapiTerpilih = null;

            btnPilihSapi.removeAttr('disabled')
            btnPilihSapi.removeClass('btn-secondary')
            btnPilihSapi.text('Pilih')

            formHarga.find('input[type=submit]').attr('disabled', 'disabled')

            cancelInfoSapi()
        }

        function pilihSapi(idSapi) {
            sapiTerpilih = listSapi.find((sapi) => sapi.id == idSapi)
            // tampilInfoSapi(JSON.stringify(sapiTerpilih))
            tampilInfoSapi(sapiTerpilih)


            const btnLain = $('.btnPilihSapi').not(`[data-id-sapi=${idSapi}]`)
            btnLain.attr('disabled', 'disabled')
            btnLain.addClass('btn-secondary')
            btnLain.text('...')

            formHarga.find('input[type=submit]').removeAttr('disabled')

        }

        function togglePilihSapi() {
            if (sapiTerpilih) {
                return cancelPilihSapi();
            }

            const idSapiTerpilih = $(this).data('id-sapi')
            pilihSapi(idSapiTerpilih)

            $(this).text('Batal')

        }

        btnPilihSapi.click(togglePilihSapi)
    })
</script>
