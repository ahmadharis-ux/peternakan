<table id="example" class="display ">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Eartag</th>
            <th scope="col">Jenis</th>
            <th scope="col">Bobot</th>
            <th scope="col">Jenis kelamin</th>
            <th scope="col">Harga Pokok</th>
            <th scope="col">Laba</th>
            <th scope="col">Status</th>
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
                <td class="text-end">Rp
                    {{ number_format($sapi->harga_pokok + $sapi->markup->sum('markup_pembulatan')) }}</td>
                {{-- @dd($sapi) --}}
                @if ($sapi->status == 'DIBELI')
                    <td class="text-end">Rp
                        {{ number_format($sapi->detailPenjualanSapi->sum('harga') - ($sapi->harga_pokok + $sapi->markup->sum('markup_pembulatan'))) }}
                    </td>
                @else
                    <td>0</td>
                @endif
                <td>{{ $sapi->status }}</td>
                <td>
                    <a href="/acc/sapi/{{ $sapi->id }}" class="btn btn-sm btn-primary btnPilihSapi"
                        data-id-sapi="{{ $sapi->id }}"><span><i class="bi-eye-fill"></i></span></a>
                </td>
            </tr>
        @endforeach

    <tbody>
</table>
