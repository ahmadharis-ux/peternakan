   @php
       $totalSaldo = $listRekening->sum('saldo');
   @endphp

   <table class="table">
       <thead>
           <tr>
               <th>Rekening</th>
               <th>Saldo</th>
           </tr>
       </thead>
       <tbody>

           {{-- {{ $listRekening }} --}}

           @foreach ($listRekening as $rekening)
               @php
                   $namaRekening = "$rekening->bank - $rekening->atas_nama";
               @endphp
               <tr>
                   {{-- <td>{{ $namaRekening }}</td> --}}
                   <td>
                       <div class="d-flex flex-column">
                           <span>{{ $namaRekening }}</span>
                           <span class="text-secondary font-monospace">{{ $rekening->nomor_rekening }}</span>
                       </div>
                   </td>
                   <td>Rp {{ number_format($rekening->saldo) }}</td>
               </tr>
           @endforeach

           <tr class="bg-light fw-bold">
               <td>TOTAL</td>
               <td>Rp {{ number_format($totalSaldo) }}</td>
           </tr>
       </tbody>
   </table>
