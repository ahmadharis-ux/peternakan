{{-- {{ $listStokPakan }} --}}
<h5>Pilih pakan</h5>

<table id="example" class="display " style="width:100%">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">#</th>
            <th scope="col">Jenis</th>
            <th scope="col">Stok</th>
            <th scope="col">Harga</th>
            <th scope="col">Qty</th>
            <th scope="col">Satuan</th>
            <th scope="col">Nominal</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listStokPakan as $stokPakan)
            <tr>
                <td>
                    <input type="checkbox" class="form-checkbox cbPilihStokPakan" name="stok_dipilih[]"
                        data-id-stok="{{ $stokPakan->id }}" value="{{ $stokPakan->id }}">
                </td>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $stokPakan->pakan->nama }}</td>
                <td>{{ $stokPakan->stok }}</td>
                <td class="text-end">Rp {{ number_format($stokPakan->harga) }}</td>
                <td>
                    <input type="number" class="form-control inputSetQty" style="width:6rem" min="0"
                        max="{{ $stokPakan->stok }}" data-id-stok="{{ $stokPakan->id }}" name="qty_pakan[]"
                        id="inputQty-{{ $stokPakan->id }}" disabled>

                    <input type="hidden" id="input-nominal-pakan-{{ $stokPakan->id }}" name="subtotal_pakan[]" disabled
                        min="0">

                </td>
                <td>{{ $stokPakan->satuanPakan->nama }}</td>
                <td class="text-end" id="nominalStokPakan-{{ $stokPakan->id }}">-</td>
            </tr>
        @endforeach
    </tbody>
</table>
