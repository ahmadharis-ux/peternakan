@php
    $listKredit = $listKreditDihandle->filter(function ($kredit) {
        $idJurnalHutang = 1;
        return $kredit->id_jurnal == $idJurnalHutang;
    });
@endphp

<div class="card recent-sales">
    <div class="card-title px-3">Histori pembelian sapi</div>
    <div class="card-body">
        <table id="example" class="display">
            <thead>
                <tr>
                    <th class="col-1">#</th>
                    <th>Tanggal</th>
                    <th>Supplier sapi</th>
                    <th class="text-center">Sapi (ekor)</th>
                    <th class="text-center">Total nominal</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listKredit as $kredit)
                    @php
                        $pk = $kredit->pihakKedua;
                        $pihakKedua = "$pk->nama_depan $pk->nama_belakang";

                        $ps = $kredit->pembelianSapi;
                        $jumlahSapi = sizeof($ps->detailPembelianSapi);
                    @endphp

                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $kredit->created_at }}</td>
                        <td>{{ $pihakKedua }}</td>
                        <td class="text-center">{{ $jumlahSapi }}</td>

                        <td class="pe-5 text-end">{{ number_format($kredit->nominal) }}</td>
                        <td>
                            <a href="/acc/hutang/{{ $kredit->id }}" class="btn btn-sm btn-primary">
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
