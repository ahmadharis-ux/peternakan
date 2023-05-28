 <table class="table">
     <thead>
         <tr>
             <th scope="col">#</th>
             <th scope="col">Tanggal</th>
             <th scope="col">Nama Pakan</th>
             <th scope="col">Harga satuan</th>
             <th scope="col" class="ps-3">Quantity</th>
         </tr>
     </thead>
     <tbody>
         @foreach ($listDetailPembelian as $item)
             <tr>
                 <th scope="row">{{ $loop->iteration }}</th>
                 <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                 <td>{{ $item->pakan->nama }}</td>
                 <td class="text-end">Rp. {{number_format( $item->harga )}}</td>
                 <td class="text-end">{{ $item->qty }} {{ $item->satuanPakan->nama }}</td>
             </tr>
         @endforeach
         <tr>
             <th colspan="4">Subtotal</th>
             <td class="text-end fw-bold">Rp {{ number_format($listDetailPembelian->sum('subtotal')) }}</td>
         </tr>
     </tbody>
 </table>
