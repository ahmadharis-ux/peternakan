<div class="card recent-sales">
    <div class="card-title px-3">Histori transaksi debit (masuk)</div>
    <div class="card-body">
        <table id="example3" class="display">
            <thead>
                <tr>
                    <th class="col-1">#</th>
                    <th>Tanggal</th>
                    <th>Jurnal</th>
                    <th>Pengirim</th>
                    <th class="text-center">Nominal</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listTransaksiDebitDihandle as $transaksi)
                    @php
                        $debit = $transaksi->debit()->first();

                        $namaJurnal = $debit->jurnal->nama;

                        $pk = $debit->pihakKedua;
                        $namaPihakKedua = "$pk->nama_depan $pk->nama_belakang";

                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $transaksi->created_at }}</td>
                        <td>{{ $namaJurnal }}</td>
                        <td>{{ $namaPihakKedua }}</td>
                        <td class="text-end pe-5">{{ number_format($transaksi->nominal) }}</td>
                        <td>{{ $transaksi->keterangan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
