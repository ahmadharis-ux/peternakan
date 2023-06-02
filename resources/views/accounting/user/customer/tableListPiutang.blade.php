<table id="example" class="display " style="width:100%">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Debit</th>
            <th scope="col">Detail</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listDebit as $debit)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $debit->created_at }}</td>
                <td>{{ $debit->keterangan }}</td>
                <td><span class="text-secondary">Rp</span> {{ number_format($debit->nominal) }}</td>
                <td>
                    <a href="/acc/user/{{ $user->id }}/piutang/{{ $debit->id }}" class="btn btn-primary">
                        <div class="icon">
                            <i class="bi bi-eye-fill"></i>
                        </div>
                    </a>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>
