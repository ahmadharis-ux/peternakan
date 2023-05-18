  <table class="table">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Keterangan</th>
              <th scope="col">Nominal</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($listOperasionalPembelian as $item)
              <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                  <td>{{ $item->keterangan }}</td>
                  <td class="text-end">{{ number_format($item->harga) }}</td>
              </tr>
          @endforeach
          <tr>
              <th colspan="3">Subtotal</th>
              <td class="fw-bold text-end">Rp {{ number_format($listOperasionalPembelian->sum('harga')) }}</td>
          </tr>
      </tbody>
  </table>
