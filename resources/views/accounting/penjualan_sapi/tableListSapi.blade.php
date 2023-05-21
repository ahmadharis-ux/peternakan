<table id="example" class="display ">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Eartag</th>
            <th scope="col">Jenis</th>
            <th scope="col">Bobot</th>
            <th scope="col">Jenis kelamin</th>
            <th scope="col">Harga Pokok</th>
            <th scope="col">Kondisi</th>
            <th scope="col"></th>

        </tr>
    </thead>
    <tbody>
        @foreach ($listSapi as $sapi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $sapi->eartag }}</td>
                <td>{{ $sapi->jenisSapi->nama }}</td>
                <td>{{ $sapi->bobot }} kg</td>
                <td>{{ $sapi->jenis_kelamin }}</td>
                <td>{{ $sapi->harga_pokok }}</td>
                <td>{{ $sapi->kondisi }}</td>
                <td>
                    <button class="btn btn-sm btn-primary btnPilihSapi"
                        data-id-sapi="{{ $sapi->id }}">Pilih</button>
                </td>
            </tr>
        @endforeach

    <tbody>
</table>

<script>
    $(document).ready(function() {
        const btnPilihSapi = $(".btnPilihSapi");
        const jumlahBtnPilihSapi = btnPilihSapi.length

        const listSapi = {!! $listSapi !!};
        let sapiTerpilih

        function cancelPilihSapi() {
            sapiTerpilih = null;

            btnPilihSapi.removeAttr('disabled')
            btnPilihSapi.removeClass('btn-secondary')
            btnPilihSapi.text('Pilih')
        }

        function pilihSapi(idSapi) {
            sapiTerpilih = listSapi.find((sapi) => sapi.id == idSapi)

            const btnLain = $('.btnPilihSapi').not(`[data-id-sapi=${idSapi}]`)
            btnLain.attr('disabled', 'disabled')
            btnLain.addClass('btn-secondary')
            btnLain.text('...')
        }

        function togglePilihSapi() {
            if (sapiTerpilih) {
                return cancelPilihSapi();
            }

            const idSapiTerpilih = $(this).data('id-sapi')
            pilihSapi(idSapiTerpilih)

            $(this).text('Batal pilih')
        }




        btnPilihSapi.click(togglePilihSapi)



    })
</script>
