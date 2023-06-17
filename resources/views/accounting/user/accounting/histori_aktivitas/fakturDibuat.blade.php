<div class="card recent-sales">
    <div class="card-title px-3">Histori faktur dibuat</div>
    <div class="card-body">
        <table id="example20" class="display " style="width:100%">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nomor</th>
                    <th scope="col">Pihak kedua</th>
                    <th scope="col">Subjek</th>
                    <th scope="col">Jurnal</th>
                    <th scope="col">Cetak</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listFakturDihandle as $faktur)
                    @php
                        $isKredit = isset($faktur->kredit);
                        $namaJurnal = $faktur[$isKredit ? 'kredit' : 'debit']->jurnal->nama;
                    @endphp
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $faktur->created_at }}</td>
                        <td>{{ $faktur->nomor_faktur }}</td>
                        <td>{{ getUserFullname($faktur->pihakKedua) }}</td>
                        <td>
                            @if ($faktur->subjek)
                                {{ $faktur->subjek }}
                            @else
                                <small class="text-muted">(Tanpa subjek)</small>
                            @endif
                        </td>
                        <td>{{ $namaJurnal }}</td>
                        <td>
                            <button class="btn btn-outline-primary btn-sm"
                                onclick="alertPrint('{{ $faktur->nomor_faktur }}')">
                                <i class="bi bi-printer-fill"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <script>
            function alertPrint(nomorFaktur) {
                alert(`print faktur ${nomorFaktur} dari storage`)
            }
        </script>

    </div>
</div>
