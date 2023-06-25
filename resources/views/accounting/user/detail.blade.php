@php
    $fullname = "$user->nama_depan $user->nama_belakang";
    $detailView = "accounting.user.$roleSlug.detail";
@endphp


@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        <h5>
            {{ $heading }}
        </h5>

        <div class="card col-md-8">
            <div class="card-title px-3">Profile {{ $user->role->nama }}</div>
            <div class="card-body">
                <div class="container mb-2">
                    <table class="table table-striped ">
                        <tr>


                            <th class="col-4">Nama </th>
                            <td>{{ $fullname }}</td>
                        </tr>
                        <tr>
                            <th class="col-4">Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th class="col-4">Telepon</th>
                            <td>{{ $user->telepon }}</td>
                        </tr>
                        <tr>
                            <th class="col-4">Alamat</th>
                            <td>{{ $user->alamat }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        @include($detailView)

    </section>
@endsection
