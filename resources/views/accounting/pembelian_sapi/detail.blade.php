@extends('layouts.main')
@section('container')
    <section class="section dashboard">

        {{--  ========== PEMBELIAN =========== --}}
        <div class="row">

            {{-- LIST SAPI DIBELI --}}
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5>
                            <span>Daftar sapi</span>
                            <button class="btn btn-sm btn-primary mx-3" data-bs-toggle="modal"
                                data-bs-target="#modalTambahSapi">Tambah</button>
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="section">
                            {{-- table list sapi dibeli --}}
                            @include('accounting.pembelian_sapi.tableListSapiDibeli')
                        </div>
                    </div>
                </div>
            </div>

            {{-- LIST OPERSIONAL --}}
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5>Biaya operasional</h5>
                    </div>
                    <div class="card-body">
                        {{-- form tambah operasional --}}
                        @include('accounting.pembelian_sapi.formTambahOperasional')
                        <hr>
                        <div class="section">
                            {{-- table list operasional --}}
                            @include('accounting.pembelian_sapi.tableListOperasional')
                        </div>
                    </div>
                </div>
            </div>
        </div>



        {{--  ========== PEMBAYARAN =========== --}}
        <div class="row">
            <div class="col">
                <div class="card">

                    <div class="card-header">
                        <h5>
                            <span>Riwayat Pembayaran</span>

                            @if ($kredit->lunas == false)
                                <button class="btn btn-sm btn-primary mx-3" data-bs-toggle="modal"
                                    data-bs-target="#modalPembayaran">Tambah</button>
                            @endif

                        </h5>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            {{-- riwayat pembayaran --}}
                            <div class="col-sm-6">
                                <div class="section">
                                    {{-- table list riwayat pembayaran --}}
                                    @include('accounting.pembelian_sapi.tableListRiwayatPembayaran')
                                </div>
                            </div>

                            {{-- table hitungan --}}
                            <div class="col-sm">
                                @include('accounting.pembelian_sapi.tableHitungan')
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>

    </section>


    {{-- modals --}}
    @include('accounting.pembelian_sapi.modalTambahSapi')
    @include('accounting.pembelian_sapi.modalPembayaran')
@endsection
