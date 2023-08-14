  {{-- table Stok Pakan --}}
  <table class="mt-2 table">
      <thead>
          <tr>
              <td>#</td>
              <td>Nama Pakan</td>
              <td>Stok</td>
              <td>Nilai Aset</td>
          </tr>
      </thead>
      <tbody>
          @foreach ($ListStokPakan as $pakan)
              @php
                  $nilaiAset = $pakan->harga * $pakan->stok;
                  $sisaStok = $pakan->stok - $pakan->detailPemakaianPakan->sum('qty');
              @endphp

              <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $pakan->pakan->nama }}</td>
                  <td>{{ $sisaStok }} {{ $pakan->satuanPakan->nama }}</td>
                  <td>Rp {{ number_format($nilaiAset) }}</td>
              </tr>
          @endforeach
      </tbody>
  </table>
