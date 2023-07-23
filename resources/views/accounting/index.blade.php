@extends('layouts.main')
@section('container')
    <section class="section dashboard">

        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">
                    <!-- Hutang Card -->
                    <div class="col-xxl-8 col-md-6">
                        <a href="/acc/rincian_hutang">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Hutang</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>Rp {{ number_format($totalHutang) }}</h6>
                                            <h6></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Piutang Card -->
                    <div class="col-xxl-8 col-md-6">
                        {{-- <a href="/acc/rincian_piutang"> --}}
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Piutang</h5>
                                <div class="d-flex align-items-center">
                                    <div class="ps-3">
                                        <h6>Rp {{ number_format($totalPiutang) }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Saldo Card -->
                    <div class="col-xxl-8 col-md-6">
                        <a href="acc/total_saldo">
                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Saldo</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>Rp
                                                {{ number_format($totalSaldo + $jumlahNilaiPembelianPakan - $jumlahNilaiPemakaianPakan) }}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Stok Sapi Card -->
                    <div class="col-xxl-8 col-md-6">
                        <a href="/acc/sapi">
                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">Stok Sapi</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>{{ $stokSapi }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <hr>

                    <!-- Total Pakan Card -->
                    <div class="col-xxl-4 col-md-6">
                        <a href="/acc/pakan">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">Total Stok Pakan</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>[stok_pakan]</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </a>
                    </div>

                </div>
            </div><!-- End Left side columns -->
        </div>

        <div class="row">
            <div class="col">
                @include('components.grafikTransaksi')
            </div>
        </div>
    </section>
@endsection
