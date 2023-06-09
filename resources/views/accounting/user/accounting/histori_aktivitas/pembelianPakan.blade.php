@php
    $listKredit = $listKreditDihandle->filter(function ($kredit) {
        $idJurnalPakan = 3;
        return $kredit->id_jurnal == $idJurnalPakan;
    });
@endphp

<div class="card recent-sales">
    <div class="card-title px-3">Histori pembelian pakan</div>
    <div class="card-body">
        <table id="example4" class="display">
            <thead>
                <tr>
                    <th class="col-1">#</th>
                    <th>Tanggal</th>
                    <th>Supplier pakan</th>
                    <th>Jumlah jenis pakan</th>
                    <th class="text-center">Total nominal</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listKredit as $kredit)
                    @php
                        $pk = $kredit->pihakKedua;
                        $pihakKedua = "$pk->nama_depan $pk->nama_belakang";

                        $ps = $kredit->pembelianPakan;
                        $jumlahJenisPakan = sizeof($ps->detailPembelianPakan);
                    @endphp

                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $kredit->created_at }}</td>
                        <td>{{ $pihakKedua }}</td>
                        <td class="text-center">{{ $jumlahJenisPakan }}</td>

                        <td class="pe-5 text-end">{{ number_format($kredit->nominal) }}</td>
                        <td>
                            <a href="/acc/pakan/{{ $kredit->id }}" class="btn btn-sm btn-primary">
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
