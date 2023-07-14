<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th scope="col" class="col-1">#</th>
            <th scope="col">Nama</th>
            {{-- <th scope="col">Pihak kedua</th>
			<th scope="col">Keterangan</th>
			<th scope="col">Kredit</th> --}}
            {{-- <th scope="col">Saldo</th> --}}
            {{-- <th scope="col">Jurnal</th> --}}
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listPekerja as $pekerja)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $pekerja->fullname() }}</td>
                <td>
                    <a href="/acc/gaji/pekerja/{{ $pekerja->id }}" class="btn btn-primary">
                        <div class="icon">
                            <i class="bi bi-eye-fill"></i>
                        </div>
                    </a>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>
