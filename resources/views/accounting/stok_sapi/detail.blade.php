@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        <div class="col-12">

            {{-- card --}}
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">{{ $heading }} </h5>
                    <div class="container mb-3">
                        {{ $sapi }}
                    </div>
                </div>
            </div>

            {{-- Riwayat bobot dan pemberian pakan --}}
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">Riwayat pemberian pakan</h5>
                    <div class="container mb-3">
                        {{ $sapi }}
                    </div>
                </div>
            </div>

            {{-- Pembelian / penjualan --}}
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">Pembelian / penjualan</h5>
                    <div class="container mb-3">
                        {{ $sapi }}
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection
