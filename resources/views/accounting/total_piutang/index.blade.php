@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        <h5>Rincian piutang</h5>

        <div class="row">
            <!-- Piutang Sapi Card -->
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Piutang Sapi</h5>

                        <div class="d-flex flex-column">
                            <label class="d-flex justify-content-between">
                                <span class="fw-bold">Debit</span>
                                <span>Rp {{ number_format($piutangSapi) }}</span>
                            </label>

                            <label class="d-flex justify-content-between">
                                <span class="fw-bold">Transaksi</span>
                                <span>Rp {{ number_format($totalTransaksiPiutangSapi) }}</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div><!-- End Sales Card -->

            <!-- Piutang Pakan Card -->
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Piutang Pakan</h5>

                        <div class="d-flex flex-column">
                            <label class="d-flex justify-content-between">
                                <span class="fw-bold">Debit</span>
                                <span>Rp {{ number_format($piutangPakan) }}</span>
                            </label>

                            <label class="d-flex justify-content-between">
                                <span class="fw-bold">Transaksi</span>
                                <span>Rp {{ number_format($totalTransaksiPiutangPakan) }}</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div><!-- End Sales Card -->

            <!-- Piutang Pakan Card -->
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Piutang Gaji Pekerja</h5>

                        <div class="d-flex flex-column">
                            <label class="d-flex justify-content-between">
                                <span class="fw-bold">Debit</span>
                                <span>Rp {{ number_format($piutangGaji) }}</span>
                            </label>

                            <label class="d-flex justify-content-between">
                                <span class="fw-bold">Transaksi</span>
                                <span>Rp {{ number_format($totalTransaksiPiutangGaji) }}</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div><!-- End Sales Card -->
        </div>
    </section>
@endsection
