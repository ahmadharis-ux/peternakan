<table id="example" class="display " style="width:100%">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Pihak kedua</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Kredit</th>
            {{-- <th scope="col">Saldo</th> --}}
            <th scope="col">Jurnal</th>
            {{-- <th scope="col">Detail</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($listPembelianSapi as $pembelianSapi)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $pembelianSapi->created_at }}</td>
                <td>{{ $pembelianSapi->kredit->pihakKedua->nama_depan }}</td>
                <td>{{ $pembelianSapi->keterangan }}</td>
                <td>[sum_kredit_transaksi_kreditSapi_nominal]</td>
                <td>
                    <a href="/acc/hutang/{{ $pembelianSapi->kredit->id }}" class="btn btn-primary">
                        <div class="icon">
                            <i class="bi bi-eye-fill"></i>
                        </div>
                    </a>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>
