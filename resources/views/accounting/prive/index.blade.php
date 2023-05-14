@extends('layouts.main')
@section('container')
<section class="section dashboard">
    
            <!-- Recent Sales -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
  
                  <div class="card-body">
                    <h5 class="card-title">Data Prive</h5>
                    <div class="container mb-3">
                      <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#prive">Prive</button>
                        <!-- Modal -->
                        <div class="modal fade" id="prive" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                              <form action="/storekas" method="post" enctype="multipart/form-data">
                                  @csrf   
                                  <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Prive</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col-sm-6 mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Owner</label>
                                        <select class="form-control" name="user_id">
                                          @foreach ($owner as $item)
                                              <option value="{{$item->id}}">{{$item->name}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="col-sm-6 mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                                        <input type="text" class="form-control" value="{{$date}}">
                                      </div>
                                      <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                                        <input type="text" class="form-control" name="keterangan" >
                                        <input type="hidden" class="form-control" name="jurnal_id" value="{{$prive->id}}" >
                                        <input type="hidden" class="form-control" name="author" value="{{auth()->user()->name}}">
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
                    <hr>
  
                    <table id="example" class="display " style="width:100%">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Tanggal</th>
                          <th scope="col">Keterangan</th>
                          <th scope="col">Nominal Pengeluaran</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data as $item)     
                        <tr>
                          <th scope="row">{{$loop->iteration}}</th>
                          <td>{{date("d-m-Y", strtotime($item->tanggal))}}</td>
                          <td>{{$item->keterangan}}</td>
                          <td></td>
                        </tr>
                        @endforeach   
                      </tbody>
                    </table>
  
                  </div>
  
                </div>
              </div><!-- End Recent Sales -->
</section>
@endsection
  