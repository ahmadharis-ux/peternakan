@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">

                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">{{ $heading }} </h5>
                            <div class="container mb-3">
                                <a class="btn btn-primary btn-sm" href="/acc/pemakaian_pakan/create">Pemakaian pakan baru</a>

                            </div>

                        </div>

                        <div class="col d-flex justify-content-end align-items-center">
                            <div class="bg-light d-inline-block p-3 rounded">
                                @php
                                    $subtotal = 0;
                                    $subtotal = $listPemakaianPakan->sum('total_pengeluaran');
                                @endphp

                                <div class="d-flex flex-column">
                                    <span class="fw-bold">Total pengeluaran</span>
                                    <span class="fs-5">Rp {{ number_format($subtotal) }}</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <hr>

                    @include('accounting.pemakaian_pakan.tableListPemakaianPakan')

                </div>

            </div>
        </div>
    </section>

    {{-- modal --}}
    {{-- @include('accounting.pemakaian_pakan.modalCreate') --}}
    {{-- @include('accounting.pemakaian_pakan.modalPilihPakan') --}}
    {{-- @include('accounting.pemakaian_pakan.modalPilihSapi') --}}
@endsection
