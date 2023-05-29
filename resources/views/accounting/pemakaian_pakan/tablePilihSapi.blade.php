<h5>Pilih sapi</h5>

<table id="example2" class="display " style="width:100%">
    <thead>
        <tr>
            <th scope="col" style="width: 10px"></th>
            <th scope="col" style="width: 3em">#</th>
            <th scope="col">Eartag</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listSapi as $sapi)
            <tr>
                <td>
                    <input type="checkbox" class="form-checkbox cbSapi" name="sapi_terpilih[]"
                        data-id-sapi="{{ $sapi->id }}" value="{{ $sapi->id }}">
                </td>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $sapi->eartag }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<div id="terpilih"></div>

<script>
    $(document).ready(function() {
        const listSapi = {!! $listSapi !!}
        const cbSapi = $(".cbSapi")
        let sapiDipilih = []

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
        }

        $(cbSapi).change(handleToggleSapi)
    })
</script>
