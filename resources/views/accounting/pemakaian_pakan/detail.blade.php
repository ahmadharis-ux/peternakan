@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        <div class="d-flex justify-content-between">
            <h5 class="d-inline-block">{{ $heading }}</h5>
            <div class="d-inline-block">
                <span>Pekerja: </span>
                <a href="/acc/user/{{ $pekerja->id }}/detail">
                    <span class="fw-bold">{{ $pekerja->nama_depan }} {{ $pekerja->nama_belakang }}</span>
                </a>
            </div>
        </div>

        {{-- table pakan dipakai --}}
        <div class="card recent-sales">
            <div class="card-body p-3">
                @include('accounting.pemakaian_pakan.detail.tableListPakanDipakai')
            </div>
        </div>

        <div class="d-flex flex-row justify-content-start">

            {{-- table sapi dipakan --}}
            <div class="card recent-sales me-3" style="min-width: 400px; max-width:100%">
                <div class="card-body p-3">
                    @include('accounting.pemakaian_pakan.detail.tableListSapiDipakan')
                </div>
            </div>

            {{-- ringkasan pemakaian pakan --}}
            <div style="min-width: 400px">
                <div class="card recent-sales">
                    <div class="card-body p-3">
                        @include('accounting.pemakaian_pakan.detail.ringkasanPemakaianPakan')
                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection
