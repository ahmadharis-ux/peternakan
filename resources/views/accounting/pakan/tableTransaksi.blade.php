@php
   function getTotalKredit($kredit){
    return number_format($kredit->transaksiKredit->sum('nominal'));
   }

   $idJurnalHutang = 1;
@endphp

<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Pihak kedua</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Kredit</th>
            {{-- <th scope="col">Saldo</th> --}}
            {{-- <th scope="col">Jurnal</th> --}}
            <th scope="col">Detail</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listKreditPakan as $kreditPakan)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $kreditPakan->created_at }}</td>
                <td>{{ $kreditPakan->pihakKedua->nama_depan }}</td>
                <td>{{ $kreditPakan->keterangan }}</td>
                <td><span class="text-secondary text-end">Rp</span> {{ getTotalKredit($kreditPakan) }}</td>
                {{-- <td>
                    <a href="#/acc/jurnal/{{ $idJurnalHutang }}">
                        {{ $kreditPakan->jurnal->nama }}
                    </a>
                </td> --}}
                <td>
                    <a href="/acc/pakan/{{ $kreditPakan->id }}" class="btn btn-primary">
                        <div class="icon">
                            <i class="bi bi-eye-fill"></i>
                        </div>
                    </a>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>