@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">{{ $heading }} </h5>
                    <div class="container mb-3">
                        <a class="btn btn-primary btn-sm" href="/acc/pemakaian_pakan/create">Pemakaian pakan baru</a>
                    </div>
                    <hr>

                    @include('accounting.pemakaian_pakan.tableListPemakaianPakan')

                </div>

            </div>
        </div>
    </section>

    {{-- modal --}}
    @include('accounting.pemakaian_pakan.modalCreate')
    {{-- @include('accounting.pemakaian_pakan.modalPilihPakan') --}}
    {{-- @include('accounting.pemakaian_pakan.modalPilihSapi') --}}
@endsection
