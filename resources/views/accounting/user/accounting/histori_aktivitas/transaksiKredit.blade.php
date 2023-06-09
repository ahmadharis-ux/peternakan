<div class="card recent-sales">
    <div class="card-title px-3">Histori transaksi kredit (keluar)</div>
    <div class="card-body">
        <table id="example1" class="display">
            <thead>
                <tr>
                    <th class="col-1">#</th>
                    <th>Tanggal</th>
                    <th>Jurnal</th>
                    <th>Penerima</th>
                    <th class="text-center">Nominal</th>
                    <th class="text-center">Adm</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listTransaksiKreditDihandle as $transaksi)
                    @php
                        $kredit = $transaksi->kredit()->first();

                        $namaJurnal = $kredit->jurnal->nama;

                        $pk = $kredit->pihakKedua;
                        $namaPihakKedua = "$pk->nama_depan $pk->nama_belakang";

                    @endphp
                    {{-- @dd($kredit) --}}
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $transaksi->created_at }}</td>
                        <td>{{ $namaJurnal }}</td>
                        <td>{{ $namaPihakKedua }}</td>
                        <td class="text-end pe-5">{{ number_format($transaksi->nominal) }}</td>
                        <td class="text-end pe-5">{{ number_format($transaksi->adm) }}</td>
                        <td>{{ $transaksi->keterangan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
