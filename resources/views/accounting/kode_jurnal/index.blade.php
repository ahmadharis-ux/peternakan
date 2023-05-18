@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">{{ $heading }} </h5>
                    <div class="container mb-3">
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalKodeJurnalBaru">Kode Jurnal Baru</button>
                    </div>
                    <hr>
                    {{-- table --}}
                    @include('accounting.kode_jurnal.tableListKodeJurnal')
                </div>

            </div>
        </div>
    </section>

    {{-- modal --}}
    @include('accounting.kode_jurnal.modalCreate')
    
@endsection