@php
    $userIsAuthor = $kredit->id_author === auth()->user()->id;
    $userPunyaTtd = auth()->user()->foto_ttd !== null;
@endphp

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


                            @if ($userIsAuthor)
                                <button class="btn btn-sm btn-primary mx-3" data-bs-toggle="modal"
                                    data-bs-target="#modalTambahSapi">Tambah</button>
                            @endif


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
                        @if ($userIsAuthor)
                            @include('accounting.pembelian_sapi.formTambahOperasional')
                        @endif
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

                            @if ($kredit->lunas == false && $userIsAuthor)
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

                        {{-- btn cetak faktur --}}
                        <div class="d-flex justify-content-end mt-3">
                            @if ($userIsAuthor)
                                <div class="d-flex flex-column">
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-primary {{ $userPunyaTtd ? '' : 'disabled btn-secondary' }}"
                                            data-bs-toggle="modal" data-bs-target="#modalCetakFaktur">Cetak
                                            faktur</button>
                                    </div>
                                    @if ($userPunyaTtd == false)
                                        <small class="text-muted">Anda belum punya tanda tangan. <a
                                                href="/editprofile">Upload
                                                di sini</a></small>
                                    @endif
                                </div>
                            @endif
                        </div>


                    </div>



                </div>
            </div>
        </div>
        </div>

    </section>


    {{-- modals --}}

    @if ($userIsAuthor)
        @include('accounting.pembelian_sapi.modalTambahSapi')
        @include('accounting.pembelian_sapi.modalPembayaran')
        @include('accounting.pembelian_sapi.modalCetakFaktur')
    @endif
@endsection
