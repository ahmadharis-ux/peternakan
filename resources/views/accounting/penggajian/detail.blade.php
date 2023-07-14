@php
    $pekerja->fullname = "$pekerja->nama_depan $pekerja->nama_belakang";
    
@endphp


@extends('layouts.main')
@section('container')
    <section class="section dashboard">

        <p>{{ $pekerja->fullname() }}</p>
        <p>{{ $waktuKredit }}</p>

        {{-- card filter bulan dan tahun --}}
        {{-- <div class="card recent-sales overflow-auto">
            <div class="card-body">
                <h5 class="card-title">Filter</h5>
                @include('accounting.penggajian.formFilter')
            </div>
        </div> --}}

        <div class="card recent-sales overflow-auto">
            <div class="card-body">
                <h5 class="card-title">Transaksi penggajian</h5>


                @if ($kreditPenggajian->lunas == false)
                    <button class="btn btn-sm btn-primary mb-3" data-bs-toggle="modal"
                        data-bs-target="#modalPembayaranGaji">Tambah</button>
                @endif

                <div class="d-flex flex-row">

                    {{-- table riwayat pembayaran --}}
                    <div class="w-100 me-3">
                        @include('accounting.penggajian.tableListRiwayatPembayaran')
                    </div>

                    {{-- table hitungan --}}
                    <div class="col-3 me-3">
                        @include('accounting.penggajian.tableHitungan')
                    </div>

                </div>

                @include('accounting.penggajian.modalPembayaran')





            </div>

        </div>
    </section>


    {{-- modals --}}
    {{-- @include('accounting.pembelian_sapi.modalTambahSapi') --}}
@endsection
