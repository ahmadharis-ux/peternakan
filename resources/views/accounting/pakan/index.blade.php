@extends('layouts.main')
@section('container')
<section class="section dashboard">
  <!-- Recent Sales -->
  <div class="col-12">
    <div class="card recent-sales overflow-auto">
      <div class="card">
        <div class="card-body">
          <div class="col-lg my-3">
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#pakan">Tambah Data Pakan</button>
            <!-- Modal -->
            <div class="modal fade" id="pakan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="/storepakan" method="post" enctype="multipart/form-data">
                        @csrf   
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal Pembayaran</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mt-2">
                              <div class="col-sm-12 mb-3">
                                <label for="">Supplier Pakan</label>
                                <select name="user_id" id="" class="form-select">
                                  @foreach ($supplier as $item)
                                  <option value="{{$item->id}}">{{$item->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                                <div class="col-sm-12 mb-3">
                                    <label for="">Nama Pakan</label>
                                    <input type="text" class="form-control" name="name" required>
                                    <input type="hidden" value="{{auth()->user()->name}}" class="form-control" name="author" required>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label for="">Satuan</label>
                                    <input type="text" class="form-control" name="satuan" required>
                                </div>
                              
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
          <table class="table mt-3">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Supplier</th>
                <th>Nama Pakan</th>
                <th>Satuan</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pakan as $item)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->user->name}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->satuan}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    @foreach ($pakan as $item)   
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header">{{$item->name}}</div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-4">
                  <div class="section mt-3">
                    <h5>{{$item->belipakan->sum('qty') - $item->pakaipakan->sum('qty')}}</h5>{{$item->satuan}}
                  </div>
                  <button class="btn btn-primary btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#pakai{{$item->id}}">Pakai</button>
                  <!-- Modal -->
                  <div class="modal fade" id="pakai{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                          <form action="/pemakaianpakan" method="post" enctype="multipart/form-data">
                              @csrf   
                              <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal Pembayaran</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  <div class="row mt-2">
                                      <div class="col-sm-12 mb-3">
                                          <label for="">Jumlah Pemakaian</label>
                                          <input type="hidden" value="{{auth()->user()->name}}" class="form-control" name="author" required>
                                          <input type="hidden" value="{{$item->id}}" class="form-control" name="pakan_id" required>
                                          <input type="text" class="form-control" name="qty" required>
                                      </div>
                                    
                                  </div>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Simpan</button>
                              </div>
                          </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                
            </div>
        </div>
    </div>
    @endforeach
  </div>
</section>
@endsection
  