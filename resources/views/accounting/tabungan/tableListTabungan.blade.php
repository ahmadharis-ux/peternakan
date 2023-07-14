<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Penerima</th>
            <th scope="col">Nominal</th>
            {{-- <th scope="col">Saldo</th> --}}
            {{-- <th scope="col">Jurnal</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($listTabungan as $tabungan)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $tabungan->created_at }}</td>
                <td>{{ $tabungan->keterangan }}</td>
                <td>{{ $tabungan->pihakKedua->fullname() }}</td>
                <td><span class="text-secondary text-end">Rp</span> {{ number_format($tabungan->nominal) }}</td>

            </tr>
        @endforeach
    </tbody>
</table>
