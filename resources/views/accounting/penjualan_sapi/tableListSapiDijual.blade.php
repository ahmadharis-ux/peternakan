 <table class="table">
     <thead>
         <tr>
             <th scope="col">#</th>
             <th scope="col">Tanggal</th>
             <th scope="col">Eartag</th>
             <th scope="col">Bobot</th>
             <th scope="col">Harga</th>
         </tr>
     </thead>
     <tbody>
         @foreach ($listSapiDijual as $item)
             <tr>
                 <th scope="row">{{ $loop->iteration }}</th>
                 <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                 <td>{{ $item->eartag }}</td>
                 <td>{{ $item->bobot }}</td>
                 <td>Rp. {{ (number_format($item->harga)) }}.-,</td>
             </tr>
         @endforeach
         <tr>
             <th colspan="4">Subtotal</th>
             <td>Rp [nominal]</td>
         </tr>
     </tbody>
 </table>
