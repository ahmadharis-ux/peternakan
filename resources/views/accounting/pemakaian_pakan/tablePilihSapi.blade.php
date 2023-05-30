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
