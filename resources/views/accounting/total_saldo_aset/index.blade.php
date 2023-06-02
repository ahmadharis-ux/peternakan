@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">Total Saldo</h5>
                    <div class="row">
                        <div class="col">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Saldo Rekening</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>Rp {{number_format($totalSaldo )}}</h6>
                                            <h6></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Saldo Aset Pakan</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>Rp {{number_format($jumlahNilaiPembelianPakan - $jumlahNilaiPemakaianPakan)}}</h6>
                                            <h6></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
