@extends('layouts.main')
@section('container')
    <section class="section dashboard">

        {{--  ========== PEMBELIAN =========== --}}
        <div class="row">

            {{-- LIST PAKAN DIBELI --}}
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5>
                            <span>Daftar Pakan</span>
                            <button class="btn btn-sm btn-primary mx-3" data-bs-toggle="modal"
                                data-bs-target="#modalCreateDetailPembelianPakan">Tambah</button>
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="section">
                            {{-- table list pakan dibeli --}}
                            @include('accounting.pakan.tableListPakanDibeli')
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
                        @include('accounting.pakan.formTambahOperasional')
                        <hr>
                        <div class="section">
                            {{-- table list operasional --}}
                            @include('accounting.pakan.tableListOperasional')
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
                                    @include('accounting.pakan.tableListRiwayatPembayaran')
                                </div>
                            </div>

                            {{-- table hitungan --}}
                            <div class="col-sm">
                                @include('accounting.pakan.tableHitungan')
                            </div>
                        </div>

                        {{-- btn cetak faktur --}}
                        <div class="d-flex justify-content-end mt-3">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCetakFaktur">Cetak
                                faktur</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>

    </section>


    {{-- modals --}}
    @include('accounting.pakan.modalDetailPembelianPakan')
    @include('accounting.pakan.modalPembayaran')
    @include('accounting.pakan.modalCetakFaktur')
@endsection
