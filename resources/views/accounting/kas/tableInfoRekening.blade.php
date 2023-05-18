    <table class="table">
        <thead>
            <tr>
                <th>Rekening</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rekening as $item)
                <tr>
                    <td>{{ $item->name }} {{ $item->norek }} {{ $item->bank }}</td>
                    <td>Rp. {{ number_format($item->pembayaran->sum('debits')) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
