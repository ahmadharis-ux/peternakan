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
            <th scope="col">Detail</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listKreditSapi as $kreditSapi)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $kreditSapi->created_at }}</td>
                <td>{{ $kreditSapi->pihakKedua->nama_depan }}</td>
                <td>{{ $kreditSapi->keterangan }}</td>
                <td><span class="text-secondary">Rp</span> {{ number_format($kreditSapi->nominal) }}</td>
                <td>
                    <a href="#/acc/buku/hutang">
                        {{ $kreditSapi->jurnal->nama }}
                    </a>
                </td>
                <td>
                    <a href="/acc/hutang/{{ $kreditSapi->id }}" class="btn btn-primary">
                        <div class="icon">
                            <i class="bi bi-eye-fill"></i>
                        </div>
                    </a>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>
