@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">{{ $heading }} </h5>
                    <div class="container mb-3">
                        <a href="/acc/piutang/baru"  class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalCreate">Piutang baru</a>
                    </div>
                    <hr>
                    {{-- table --}}
                    @include('accounting.penjualan_sapi.tableListDebitSapi')
                </div>

            </div>
        </div>
    </section>
    {{-- modal --}}
    @include('accounting.penjualan_sapi.modalCreate')
@endsection
