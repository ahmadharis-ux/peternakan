<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Pihak kedua</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Debit</th>
            {{-- <th scope="col">Saldo</th> --}}
            <th scope="col">Jurnal</th>
            <th scope="col">Detail</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listDebitSapi as $debitSapi)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $debitSapi->created_at }}</td>
                <td>{{ $debitSapi->pihakKedua->fullname() }}</td>
                <td>{{ $debitSapi->keterangan }}</td>
                <td><span class="text-secondary">Rp</span> {{ number_format($debitSapi->nominal) }}</td>
                <td>
                    <a href="#/acc/buku/piutang">
                        {{ $debitSapi->jurnal->nama }}
                    </a>
                </td>
                <td>
                    <a href="/acc/piutang/{{ $debitSapi->id }}" class="btn btn-primary">
                        <div class="icon">
                            <i class="bi bi-eye-fill"></i>
                        </div>
                    </a>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>
