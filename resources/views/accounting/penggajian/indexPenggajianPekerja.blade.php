@php
    $belumInputGajiBulanIni = sizeof($penggajianBulanIni) < 1;
@endphp


@extends('layouts.main')
@section('container')
    <section class="section dashboard">

        <p>{{ $pekerja->fullname }}</p>

        {{-- table list penggajian pekerja per bulan --}}
        <div class="card recent-sales overflow-auto">
            <div class="card-body">
                <h5 class="card-title">List penggajian perbulan</h5>

                @if ($belumInputGajiBulanIni)
                    belum input gaji bulan ini
                @endif


                <hr>

                @include('accounting.penggajian.tableListRiwayatPenggajianPekerja')

            </div>
        </div>
    </section>


    {{-- modals --}}
    {{-- @include('accounting.pembelian_sapi.modalTambahSapi') --}}
@endsection
