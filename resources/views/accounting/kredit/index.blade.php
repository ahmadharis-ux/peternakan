@extends('layouts.main')
@section('container')
    {{-- @dd($listSupplierSapi) --}}

    <section class="section dashboard">
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">Data Hutang </h5>
                    <div class="container mb-3">
                        {{-- Hutang --}}
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalCreateHutang">Hutang baru</button>
                        <!-- Modal create hutang -->
                        @include('accounting.kredit.modalCreateHutang')
                    </div>
                    <hr>

                    {{-- table list hutang --}}
                    @include('accounting.kredit.tableHutang')
                </div>

            </div>
        </div>
    </section>
@endsection
