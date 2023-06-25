<p>
</p>


<table id="example" class="display " style="width:100%">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Nama</th>
            <th scope="col">Keterangan</th>
            <th scope="col" class="text-center">Debit</th>
            <th scope="col" class="text-center">Kredit</th>
            <th scope="col">Saldo</th>
            <th scope="col">Jurnal</th>
            <th scope="col">Detail</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($historiKas as $kas)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $kas->created_at }}</td>
                <td>{{ $kas->pihakKedua->fullname }}</td>
                <td>{{ $kas->keterangan }}</td>
                <td class="text-end">{{ number_format($kas->isKredit ? 0 : $kas->nominal) }}</td>
                <td class="text-end">{{ number_format($kas->isKredit ? $kas->nominal : 0) }}</td>
                <td>???</td>
                <td>{{ $kas->jurnal->nama }}</td>
                <td>
                    <a href="{{ $kas->linkDetail }}" class="btn btn-sm btn-primary"><span><i
                                class="bi-eye-fill"></i></span></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
