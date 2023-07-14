<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th scope="col" class="col-1">#</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Pekerja</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Nominal</th>
            <th scope="col">Tunai</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listKreditPenggajian as $kredit)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $kredit->created_at }}</td>
                <td>{{ $kredit->pihakKedua->fullname() }}</td>
                <td>{{ $kredit->keterangan }}</td>
                <td>Rp {{ number_format($kredit->nominal) }}</td>
                <td>[nominal]</td>
                <td>
                    <a href="/acc/gaji/{{ $kredit->id }}" class="btn btn-primary">
                        <div class="icon">
                            <i class="bi bi-eye-fill"></i>
                        </div>
                    </a>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>
