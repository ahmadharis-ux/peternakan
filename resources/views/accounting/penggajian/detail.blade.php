@php
    $filtered = request('bulan') || request('tahun');
    $belumInputGaji = $kreditPenggajian == null;
@endphp

@extends('layouts.main')
@section('container')
    <section class="section dashboard">

        {{-- card filter bulan dan tahun --}}
        <div class="card recent-sales overflow-auto">
            <div class="card-body">
                <h5 class="card-title">Filter</h5>
                @include('accounting.penggajian.formFilter')
            </div>
        </div>

        <div class="card recent-sales overflow-auto">
            <div class="card-body">
                <h5 class="card-title">Transaksi penggajian</h5>

                @if ($belumInputGaji)
                    <div class="p-3">
                        <span class="d-block text-center mb-3 fw-bold">
                            Gaji bulan ini belum diinput!
                        </span>

                        <hr>

                        <form action="/acc/gaji/pekerja/{{ $pekerja->id }}" method="post"
                            class="col-sm-12 col-md-6 mx-auto">
                            @csrf
                            <input type="hidden" value="{{ $pekerja->id }}" name="id_pekerja">

                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Input nominal gaji bulan ini</label>
                                <input name="nominal_gaji" type="number" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Keterangan</label>
                                <textarea class="form-control" name="keterangan"cols="30" rows="3"></textarea>
                            </div>

                            <input type="submit" value="Simpan" class="btn btn-primary">
                        </form>
                    </div>
                @else
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
                        <div class="w-100 me-3">
                            @include('accounting.penggajian.tableHitungan')
                        </div>

                    </div>

                    @include('accounting.penggajian.modalPembayaran')
                @endif




            </div>

        </div>
    </section>


    {{-- modals --}}
    {{-- @include('accounting.pembelian_sapi.modalTambahSapi') --}}
@endsection
