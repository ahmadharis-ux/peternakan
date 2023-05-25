@extends('layouts.main')
@section('container')
    <section class="section dashboard">

        {{-- ======================== COBA ======================== --}}

        {{-- ======================== COBA ======================== --}}


        {{--  ========== PENJUALAN =========== --}}
        <div class="row">

            {{-- LIST SAPI DIJUAL --}}
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5>
                            <span>Daftar sapi dijual</span>
                            <button class="btn btn-sm btn-primary mx-3" data-bs-toggle="modal"
                                data-bs-target="#modalPilihSapi">Tambah Sapi</button>
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="section">
                            {{-- table list sapi dijual --}}
                            @include('accounting.penjualan_sapi.tableListSapiDijual')
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
                        @include('accounting.penjualan_sapi.formTambahOperasional')
                        <hr>
                        <div class="section">
                            {{-- table list operasional --}}
                            @include('accounting.penjualan_sapi.tableListOperasional')
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
                            @if ($debit->lunas == false)
                                <button class="btn btn-sm btn-primary mx-3" data-bs-toggle="modal"
                                    data-bs-target="#modalPembayaran">Tambah</button>
                            @endif
                        </h5>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            {{-- riwayat pembayaran --}}
                            <div class="col-sm-8">
                                <div class="section">
                                    {{-- table list riwayat pembayaran --}}
                                    @include('accounting.penjualan_sapi.tableListRiwayatPembayaran')
                                </div>
                            </div>

                            {{-- table hitungan --}}
                            <div class="col-sm-4">
                                @include('accounting.penjualan_sapi.tableHitungan')
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>


    {{-- modals --}}
    @include('accounting.penjualan_sapi.modalPilihSapi')
    @include('accounting.penjualan_sapi.modalPembayaran')
@endsection
