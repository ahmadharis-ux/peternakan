@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">{{ $heading }} </h5>
                    <div class="container mb-3">
                        <a href="/acc/hutang/baru" class="btn btn-sm btn-primary">Hutang baru</a>
                    </div>
                    <hr>
                    {{-- table --}}
                    @include('accounting.pembelian_sapi.table')
                </div>

            </div>
        </div>
    </section>
@endsection
