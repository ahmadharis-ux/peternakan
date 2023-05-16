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
          {{-- @foreach ($data->operasional as $item)
              <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                  <td>{{ $item->keterangan }}</td>
                  <td>Rp. {{ number_format($item->nominal) }}</td>
              </tr>
          @endforeach --}}
          <tr>
              <th colspan="3">Subtotal</th>
              <td>Rp [sum_nominal]</td>
          </tr>
      </tbody>
  </table>
