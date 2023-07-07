@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">{{ $heading }} </h5>
                    <div class="container mb-3">
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalRoleBaru">Role baru</button>
                    </div>
                    <hr>
                    {{-- table --}}
                    @include('admin.role.tableListRole')
                </div>

            </div>
        </div>
    </section>

    {{-- modal --}}
    @include('admin.role.modalCreate')
@endsection
