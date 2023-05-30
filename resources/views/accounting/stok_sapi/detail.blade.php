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
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Tanggal</td>
                                    <td>Nominal Pakan</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sapi->markup as $riwayatpemberianpakan)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$riwayatpemberianpakan->created_at}}</td>
                                        <td>Rp {{number_format($riwayatpemberianpakan->markup_pembulatan)}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
