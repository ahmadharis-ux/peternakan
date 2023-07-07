{{-- @foreach ($listRekening as $item)
    <p>{{ $item }}</p>
@endforeach --}}


<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">No. Rekening</th>
            <th scope="col">Atas nama</th>
            <th scope="col">Bank</th>
            <th scope="col">Saldo (Rp)</th>
            <th scope="col">Opsi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listRekening as $rekening)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $rekening->nomor_rekening }}</td>
                <td>{{ $rekening->atas_nama }}</td>
                <td>{{ $rekening->bank }}</td>
                <td class="text-end">{{ number_format($rekening->saldo) }}</td>
                <td>

                    <button class="btn btn-sm btn-warning border-0 text-white" data-bs-toggle="modal"
                        data-bs-target="#modalEditRekening{{ $rekening->id }}"> <i
                            class="bi bi-pencil-fill"></i></button>

                    <button class="btn btn-sm btn-danger border-0 text-white" data-bs-toggle="modal"
                        data-bs-target="#modalDeleteRekening{{ $rekening->id }}"> <i
                            class="bi bi-trash-fill"></i></button>

                    {{-- modal --}}
                    @include('owner.rekening.modalEdit')
                    @include('owner.rekening.modalDelete')
                </td>
            </tr>
        @endforeach
    </tbody>

</table>
