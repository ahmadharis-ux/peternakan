<table id="example" class="display " style="width:100%">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Nama</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Debit</th>
            <th scope="col">Kredit</th>
            <th scope="col">Saldo</th>
            <th scope="col">Jurnal</th>
            <th scope="col">Detail</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listKas as $kas)
            @php
            @endphp

            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ date('d/m/Y', strtotime($kas->created_at)) }}</td>
                <td>{{ $kas->pihakKedua }}</td>
                <td>{{ $kas->keterangan }}</td>
                <td>Rp {{ number_format($kas->is_kredit ? 0 : $kas->nominal) }}</td>
                <td>Rp {{ number_format($kas->is_kredit ? $kas->nominal : 0) }}</td>
                <td>???</td>
                <td>{{ $kas->jurnal }}</td>
                <td>
                    <a href="{{ $kas->linkDetail }}" class="btn btn-sm btn-primary"><span><i
                                class="bi-eye-fill"></i></span></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
