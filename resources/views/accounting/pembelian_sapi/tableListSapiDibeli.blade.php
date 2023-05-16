 <table class="table">
     <thead>
         <tr>
             <th scope="col">#</th>
             <th scope="col">Tanggal</th>
             <th scope="col">Eartag</th>
             <th scope="col">Bobot</th>
             <th scope="col" class="ps-3">Harga</th>
         </tr>
     </thead>
     <tbody>
         @foreach ($listDetailPembelian as $item)
             <tr>
                 <th scope="row">{{ $loop->iteration }}</th>
                 <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                 <td>{{ $item->eartag }}</td>
                 <td>{{ $item->bobot }} kg</td>
                 <td class="text-end">{{ number_format($item->harga) }}</td>
             </tr>
         @endforeach
         <tr>
             <th colspan="4">Subtotal</th>
             <td class="text-end fw-bold">Rp {{ number_format($listDetailPembelian->sum('harga')) }}</td>
         </tr>
     </tbody>
 </table>
