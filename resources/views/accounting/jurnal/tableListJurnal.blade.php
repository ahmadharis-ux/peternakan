<table id="example" class="display " style="width:100%">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Kode jurnal</th>
            <th scope="col">Nama Jurnal</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listJurnal as $jurnal)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $jurnal->kodeJurnal->kode }}</td>
                <td>{{ $jurnal->nama }}</td>
                <td>

                    {{-- btn lihat detail --}}
                    <a href="/acc/jurnal/{{ $jurnal->id }}" class="btn btn-primary btn-sm mx-1">
                        <div class="icon">
                            <i class="bi bi-eye-fill"></i>
                        </div>
                    </a>

                    <button data-bs-toggle="modal" data-bs-target="#modalEditJurnal-{{ $jurnal->id }}"
                        class="btn btn-warning text-white btn-sm mx-1">
                        <div class="icon">
                            <i class="bi bi-pencil-fill"></i>
                        </div>
                    </button>

                    <button data-bs-toggle="modal" data-bs-target="#modalDeleteJurnal-{{ $jurnal->id }}"
                        class="btn btn-danger btn-sm mx-1">
                        <div class="icon">
                            <i class="bi bi-trash-fill"></i>
                        </div>
                    </button>
                </td>
            </tr>

            @include('accounting.jurnal.modalEdit')
            @include('accounting.jurnal.modalDelete')
        @endforeach
    </tbody>
</table>
