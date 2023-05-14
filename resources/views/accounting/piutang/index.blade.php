@extends('layouts.main')
@section('container')
<section class="section dashboard">
    
            <!-- Recent Sales -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
  
                  <div class="card-body">
                    <h5 class="card-title">Data Piutang </h5>
                    <div class="container mb-3">
                        <a href="/acc/create/hutang" class="btn btn-sm btn-primary">Piutang</a>
                    </div>
                    <hr>
  
                    <table id="example" class="display " style="width:100%">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Tanggal</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Keterangan</th>
                          <th scope="col">Debit</th>
                          <th scope="col">Kredit</th>
                          <th scope="col">Saldo</th>
                          <th scope="col">Jurnal</th>
                          <th scope="col">Detail</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($kas as $item)    
                        <tr>
                          <th scope="row">{{$loop->iteration}}</th>
                          <td>{{date("d/m/  Y", strtotime($item->tanggal))}}</td>
                          <td><a href="#" class="text-primary">{{$item->user->name}}</a></td>
                          <td>{{$item->keterangan}}</td>
                          <td>Rp. {{number_format($item->pembayaran->sum('debit'))}}</td>
                          <td>Rp. {{number_format($item->pembayaran->sum('kredit'))}}</td>
                          <td>Rp. </td>
                          <td><a href="#" class="text-primary">{{$item->jurnal->name}}</a></td>
                          <td><a href="/detail/kas/{{$item->jurnal->id}}/{{$item->id}}"  class="btn btn-sm text-primary">Lihat</a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
  
                  </div>
  
                </div>
              </div><!-- End Recent Sales -->
</section>
@endsection
  