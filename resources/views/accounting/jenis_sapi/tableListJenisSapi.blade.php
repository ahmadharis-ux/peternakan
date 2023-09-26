<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th scope="col" class="col-1">#</th>
            <th scope="col">Jenis sapi</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listJenisSapi as $jenisSapi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $jenisSapi->nama }}</td>
                <td>

                    {{-- btn lihat detail --}}
                    {{-- <a href="/acc/jenis_sapi/{{ $jenisSapi->id }}" class="btn btn-primary btn-sm mx-1">
                        <div class="icon">
                            <i class="bi bi-eye-fill"></i>
                        </div>
                    </a> --}}

                    <button data-bs-toggle="modal" data-bs-target="#modalEditJenisSapi-{{ $jenisSapi->id }}"
                        class="btn btn-warning btn-sm mx-1 text-white">
                        <div class="icon">
                            <i class="bi bi-pencil-fill"></i>
                        </div>
                    </button>

                    <button data-bs-toggle="modal" data-bs-target="#modalDeleteJenisSapi-{{ $jenisSapi->id }}"
                        class="btn btn-danger btn-sm mx-1">
                        <div class="icon">
                            <i class="bi bi-trash-fill"></i>
                        </div>
                    </button>
                </td>
            </tr>

            @include('accounting.jenis_sapi.modalEdit')
            @include('accounting.jenis_sapi.modalDelete')
        @endforeach
    </tbody>
</table>
