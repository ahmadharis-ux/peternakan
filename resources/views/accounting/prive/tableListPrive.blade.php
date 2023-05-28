<table id="example" class="display " style="width:100%">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Pelaku</th>
            <th scope="col">Nominal</th>
            {{-- <th scope="col">Saldo</th> --}}
            {{-- <th scope="col">Jurnal</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($listPrive as $prive)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $prive->created_at }}</td>
                <td>{{ $prive->keterangan }}</td>
                <td>{{ $prive->pihakKedua->nama_depan }}</td>
                <td><span class="text-secondary text-end">Rp</span> {{ number_format($prive->nominal) }}</td>

            </tr>
        @endforeach
    </tbody>
</table>
