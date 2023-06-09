@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        <h5>Rincian hutang</h5>

        <div class="row">
            <!-- Hutang Sapi Card -->
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Hutang Sapi</h5>

                        <div class="d-flex flex-column">
                            <label class="d-flex justify-content-between">
                                <span class="fw-bold">Kredit</span>
                                <span>Rp {{ number_format($hutangSapi) }}</span>
                            </label>

                            <label class="d-flex justify-content-between">
                                <span class="fw-bold">Transaksi</span>
                                <span>Rp {{ number_format($totalTransaksiHutangSapi) }}</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div><!-- End Sales Card -->

            <!-- Hutang Pakan Card -->
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Hutang Pakan</h5>

                        <div class="d-flex flex-column">
                            <label class="d-flex justify-content-between">
                                <span class="fw-bold">Kredit</span>
                                <span>Rp {{ number_format($hutangPakan) }}</span>
                            </label>

                            <label class="d-flex justify-content-between">
                                <span class="fw-bold">Transaksi</span>
                                <span>Rp {{ number_format($totalTransaksiHutangPakan) }}</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div><!-- End Sales Card -->

            <!-- Hutang Pakan Card -->
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Hutang Gaji Pekerja</h5>

                        <div class="d-flex flex-column">
                            <label class="d-flex justify-content-between">
                                <span class="fw-bold">Kredit</span>
                                <span>Rp {{ number_format($hutangGaji) }}</span>
                            </label>

                            <label class="d-flex justify-content-between">
                                <span class="fw-bold">Transaksi</span>
                                <span>Rp {{ number_format($totalTransaksiHutangGaji) }}</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div><!-- End Sales Card -->
        </div>
    </section>
@endsection
