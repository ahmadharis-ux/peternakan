<div class="card recent-sales">
    <div class="card-title px-3">Histori pemakaian pakan</div>
    <div class="card-body">
        <table id="example5" class="display">
            <thead>
                <tr>
                    <th class="col-1">#</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th class="text-center">Jumlah sapi</th>
                    <th class="text-center">Pengeluaran</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listPemakaianPakanDihandle as $pemakaian)
                    @php
                        $jumlahSapi = sizeof($pemakaian->markup);
                    @endphp

                    {{-- @dd($pemakaian) --}}

                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $pemakaian->created_at }}</td>
                        <td>{{ $pemakaian->keterangan }}</td>
                        <td class="text-center">{{ $jumlahSapi }}</td>

                        <td class="pe-5 text-end">{{ number_format($pemakaian->total_pengeluaran) }}</td>
                        <td>
                            <a href="/acc/pemakaian_pakan/{{ $pemakaian->id }}" class="btn btn-sm btn-primary">
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
