<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal</th>
            {{-- <th scope="col">Keterangn</th> --}}
            <th scope="col">adm</th>
            <th scope="col">Nominal</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listRiwayatTransaksi as $item)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                <td>{{ $item->adm }}</td>
                <td>Rp. {{ number_format($item->kredit) }}</td>
            </tr>
        @endforeach
        <tr>
            <th colspan="3">Subtotal</th>
            <td>Rp [sum_nominal]</td>
        </tr>
    </tbody>
</table>
