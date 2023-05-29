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
                    <input type="checkbox" class="form-checkbox cbPilihStokPakan" name="sapi_terpilih[]"
                        data-id-stok="{{ $stokPakan->id }}">
                </td>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $stokPakan->pakan->nama }}</td>
                <td>{{ $stokPakan->stok }}</td>
                <td class="text-end">Rp {{ number_format($stokPakan->harga) }}</td>
                <td>
                    <input type="number" class="form-control inputSetQty" style="width:6rem" min="0"
                        max="{{ $stokPakan->stok }}" data-id-stok="{{ $stokPakan->id }}"
                        id="inputQty-{{ $stokPakan->id }}" disabled>
                </td>
                <td>{{ $stokPakan->satuanPakan->nama }}</td>
                <td class="text-end" id="nominalStokPakan-{{ $stokPakan->id }}">-</td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>
    const formatNumberOption = {
        style: 'currency',
        currency: 'IDR',
        maximumFractionDigits: 0,
        toLocaleString: function(number) {
            return number.replace(/\./g, ',');
        }
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

    function handleToggle(evt) {
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
    }



    $(inputSetQty).keyup(handleChangeQty)
    $(inputSetQty).change(handleChangeQty)
    $(cbPilih).change(handleToggle)
</script>
