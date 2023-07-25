<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Pihak kedua</th>
            <th scope="col">Keterangan</th>
            <th scope="col" class="text-center">Debit</th>
            <th scope="col" class="text-center">Kredit</th>
            <th scope="col">Saldo</th>
            <th scope="col">Jurnal</th>
            <th scope="col">Author</th>
            <th scope="col">Detail</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($historiTransaksi as $trx)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $trx->created_at }}</td>
                <td>{{ $trx->pihakKedua->fullname() }}</td>
                <td>{{ $trx->keterangan }}</td>

                {{-- debit --}}
                <td class="text-end">{{ number_format($trx->isKredit ? 0 : $trx->nominal) }}</td>

                {{-- kredit --}}
                <td class="text-end">{{ number_format($trx->isKredit ? $trx->nominal : 0) }}</td>


                <td class="text-end">{{ number_format($trx->current_saldo) }}</td>
                <td>{{ $trx->jurnal->nama }}</td>
                <td>{{ $trx->author->fullname() }}</td>
                <td>
                    <a href="{{ $trx->linkDetail }}" class="btn btn-sm btn-primary"><span><i
                                class="bi-eye-fill"></i></span></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
