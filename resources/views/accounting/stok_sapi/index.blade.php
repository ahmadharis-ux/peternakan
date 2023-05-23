@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        <div class="col-12">

            {{-- card filter --}}
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">Filter</h5>
                    @include('accounting.stok_sapi.formFilter')

                </div>
            </div>

            {{-- card table sapi --}}
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">{{ $heading }} </h5>
                    <div class="container mb-3">
                        {{-- <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalCreatePembelianSapi">Hutang baru</button> --}}
                    </div>
                    <hr>
                    {{-- table --}}
                    @include('accounting.stok_sapi.tableListSapi')
                </div>
            </div>
        </div>
    </section>

    {{-- modal --}}
    {{-- @include('accounting.pembelian_sapi.modalCreate') --}}
@endsection
