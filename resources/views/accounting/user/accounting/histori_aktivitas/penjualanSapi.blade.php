@php
    $listDebit = $listDebitDihandle->filter(function ($debit) {
        $idJurnalPiutang = 2;
        return $debit->id_jurnal == $idJurnalPiutang;
    });
@endphp

<div class="card recent-sales">
    <div class="card-title px-3">Histori penjualan sapi</div>
    <div class="card-body">
        <table id="example2" class="display">
            <thead>
                <tr>
                    <th class="col-1">#</th>
                    <th>Tanggal</th>
                    <th>Customer</th>
                    <th class="text-center">Sapi (ekor)</th>
                    <th class="text-center">Total nominal</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listDebit as $debit)
                    @php
                        $pk = $debit->pihakKedua;
                        $pihakKedua = "$pk->nama_depan $pk->nama_belakang";

                        $ps = $debit->penjualanSapi;
                        $jumlahSapi = sizeof($ps->detailPenjualanSapi);
                    @endphp

                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $debit->created_at }}</td>
                        <td>{{ $pihakKedua }}</td>
                        <td class="text-center">{{ $jumlahSapi }}</td>

                        <td class="pe-5 text-end">{{ number_format($debit->nominal) }}</td>
                        <td>
                            <a href="/acc/piutang/{{ $debit->id }}" class="btn btn-sm btn-primary">
                                <div class="icon">
                                    <i class="bi bi-eye-fill"></i>
                                </div>
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
