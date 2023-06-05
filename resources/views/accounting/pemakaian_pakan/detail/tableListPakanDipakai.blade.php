<h5>Pakan digunakan</h5>

<table id="example" class="display " style="width:100%">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Jenis</th>
            <th scope="col" class="text-center">Harga</th>
            <th scope="col">Qty</th>
            <th scope="col">Satuan</th>
            <th scope="col" class="text-center">subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listDetailPemakaianPakan as $detail)
            @php
                $stokPakan = $detail->stokPakan;
            @endphp

            <tr>
                <td class="fw-bold">{{ $loop->iteration }}</td>
                <td>{{ $stokPakan->pakan->nama }}</td>
                <td class="text-end pe-5">Rp {{ number_format($stokPakan->harga) }}</td>
                <td>{{ $detail->qty }}</td>
                <td>{{ $stokPakan->satuanPakan->nama }}</td>
                <td class="text-end pe-5">Rp {{ number_format($detail->subtotal) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
