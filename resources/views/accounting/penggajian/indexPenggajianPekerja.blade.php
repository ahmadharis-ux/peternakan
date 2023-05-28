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
                    <button class="btn btn-sm btn-primary mx-3" data-bs-toggle="modal"
                        data-bs-target="#modalInputNominalGaji">Input gaji bulan ini</button>
                    @include('accounting.penggajian.modalInputNominalGaji')
                @endif


                <hr>

                @include('accounting.penggajian.tableListRiwayatPenggajianPekerja')

            </div>
        </div>
    </section>
@endsection
