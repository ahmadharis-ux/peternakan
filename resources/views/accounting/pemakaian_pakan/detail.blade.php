@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        <h5>{{ $heading }}</h5>

        {{-- table pakan dipakai --}}
        <div class="card recent-sales">
            <div class="card-body p-3">
                @include('accounting.pemakaian_pakan.detail.tableListPakanDipakai')
            </div>
        </div>

        <div class="d-flex flex-row justify-content-between">
            {{-- table sapi dipakan --}}
            <div class="card recent-sales">
                <div class="card-body p-3">
                    @include('accounting.pemakaian_pakan.detail.tableListSapiDipakan')
                </div>
            </div>

            {{-- ringkasan pemakaian pakan --}}
            <div class="card recent-sales">
                <div class="card-body p-3">
                    @include('accounting.pemakaian_pakan.detail.ringkasanPemakaianPakan')
                </div>
            </div>
        </div>

    </section>
@endsection
