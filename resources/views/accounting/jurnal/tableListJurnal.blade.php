<table id="example" class="display " style="width:100%">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Kode jurnal</th>
            <th scope="col">Nama Jurnal</th>
            <th scope="col">Detail</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listJurnal as $jurnal)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $jurnal->kodeJurnal->kode }}</td>
                <td>{{ $jurnal->nama }}</td>
                <td>
                    <a href="/acc/jurnal/{{ $jurnal->id }}" class="btn btn-primary btn-sm">
                        <div class="icon">
                            <i class="bi bi-eye-fill"></i>
                        </div>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
