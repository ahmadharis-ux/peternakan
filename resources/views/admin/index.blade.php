@extends('layouts.main')
@section('container')
    <section class="section dashboard">

        {{-- cards role --}}
        <div class="d-flex justify-content-center flex-row flex-wrap">
            @foreach ($listRole as $role)
                @php
                    $jumlahUser = $roleCount[$role->id]->count();
                @endphp

                <a href="/admin/users?role={{ $role->id }}" class="cardRole card col-md-3 m-3 py-3 px-4"
                    style="color: rgb(71, 71, 71)">
                    <span class="fw-bold">{{ $role->nama }}</span>
                    <span class="d-block display-3 text-end">{{ $jumlahUser }}</span>
                </a>
            @endforeach
        </div>
    </section>
@endsection

<style>
    .cardRole {}

    .cardRole:hover {
        background: rgb(221, 221, 221);
    }
</style>
