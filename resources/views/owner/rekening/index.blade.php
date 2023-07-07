@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        <div class="col-12">
            {{-- alerts --}}
            <div class="d-block mx-auto">
                @if (session()->has('success'))
                    <div class="alert alert-success col" role="alert">
                        {{ session('success') }}
                    </div>
                @elseif(session()->has('error'))
                    <div class="alert alert-danger col" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
            </div>

            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">{{ $heading }} </h5>
                    <div class="container mb-3">
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalRekeningBaru">Rekening baru</button>
                    </div>
                    <hr>
                    {{-- table --}}
                    @include('owner.rekening.tableListRekening')
                </div>

            </div>
        </div>
    </section>

    {{-- modal --}}
    @include('owner.rekening.modalCreate')
@endsection
