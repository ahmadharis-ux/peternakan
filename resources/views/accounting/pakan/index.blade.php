@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">{{ $heading }} </h5>
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
