@php
    // $sumNominal = $listRiwayatTransaksi->sum('nominal');
    // $sumAdm = $listRiwayatTransaksi->sum('adm');

    // $totalBayar = number_format($sumNominal);
    // $totalIncludeAdm = number_format($sumNominal + $sumAdm);

    $sisaSaldo = $kreditPenggajian->nominal;
@endphp

<div class="d-flex justify-content-between">
    {{-- riwayat pembayaran gaji --}}
    <div style="width: 70%">
        <table id="example" class="display " style="width:100%">
            <thead>
                <tr>
                    <th scope="col" class="col-1">#</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Nominal</th>

                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

    </div>

    {{-- sisa saldo --}}
    <div>
        <div class="d-flex flex-column justify-content-end">
            <span class="fw-bold">Sisa saldo gaji: </span>
            <span class="fs-3">{{ $sisaSaldo }}</span>
        </div>
    </div>



</div>
