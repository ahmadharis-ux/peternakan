<table id="example20" class="display " style="width:100%">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Nomor</th>
            {{-- <th scope="col">Author</th> --}}
            <th scope="col">Subjek</th>
            <th scope="col">Cetak</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listFaktur as $faktur)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $faktur->created_at }}</td>
                <td>{{ $faktur->nomor_faktur }}</td>
                <td>
                    @if ($faktur->subjek)
                        {{ $faktur->subjek }}
                    @else
                        <small class="text-muted">(Tanpa subjek)</small>
                    @endif
                </td>
                <td>
                    <button class="btn btn-outline-primary btn-sm" onclick="alertPrint()">
                        <i class="bi bi-printer-fill"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>
    function alertPrint() {
        alert('faktur can disimpen di storage')
    }
</script>
