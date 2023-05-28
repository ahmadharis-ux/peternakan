@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">{{ $heading }} </h5>
                    <div class="row">
                        <div class="col">
                            <div class="container mb-3">
                              <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                  data-bs-target="#modalCreateJenisPakan">Tambah Pakan</button>
                                  <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                  data-bs-target="#modalJenisPakan">Lihat Data Jenis Pakan</button>
                            </div>
                            <div class="container mb-3">
                              <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                  data-bs-target="#modalCreateSatuanPakan">Tambah Satuan</button>
                              <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                  data-bs-target="#modalSatuanPakan">Lihat Data Satuan</button>
                            </div>
                        </div>
                        <div class="col">
                            <label for="">Stok Pakan <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                data-bs-target="#modalPakaiPakan">Pakai Pakan <i class="bi bi-cart-plus-fill"></i></button></label>
                                {{-- table Stok Pakan --}}
                            <table class="table mt-2">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Nama Pakan</td>
                                        <td>Stok</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ListStokPakan as $pakan)     
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$pakan->pakan->nama}}</td>
                                        <td>{{$pakan->stok}} {{$pakan->satuanPakan->nama}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- Modal Pemakaian Pakan --}}
                            <!-- Modal -->
                                <div class="modal fade" id="modalPakaiPakan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Pemakaian Pakan</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <td>Nama Pakan</td>
                                                        <td>Sisa Pakan</td>
                                                        <td>Satuan Pakan</td>
                                                        <td>Jumlah Pemakaian</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($ListStokPakan as $Stokpakan)     
                                                    <tr>
                                                        <td>
                                                            <div class="form-check col">
                                                                <input class="form-check-input" name="id_pakan[]" type="checkbox" value="{{$pakan->id}}" id="flexCheckChecked">
                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                    {{$Stokpakan->pakan->nama}}
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>{{$Stokpakan->stok}}</td>
                                                        <td>
                                                            <input type="text" class="form-control border-0" name="id_satuan_pakan" value="{{$Stokpakan->satuanPakan->nama}}">
                                                        </td>
                                                        <td>
                                                            <input type="number" class="form-control" name="qty" >
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card recent-sales overflow-auto">
              <div class="card-body">
                <h5 class="card-title">Daftar Transaksi Pakan</h5>
                <button type="button" class="btn btn-sm btn-primary mb-3" data-bs-toggle="modal"
                              data-bs-target="#modalCreateKreditPakan">Beli Pakan</button>
                              {{-- table --}}
                              @include('accounting.pakan.tableTransaksi')
              </div>
            </div>
        </div>
    </section>

    {{-- modal --}}
    @include('accounting.pakan.modalCreateJenisPakan')
    {{-- table --}}
    @include('accounting.pakan.tableJenis')

    @include('accounting.pakan.modalCreateSatuanPakan')
    {{-- table --}}
    @include('accounting.pakan.tableSatuan')

    @include('accounting.pakan.modalCreateKreditPakan')

@endsection
