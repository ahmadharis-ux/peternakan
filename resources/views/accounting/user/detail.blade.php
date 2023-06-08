@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        <h5>
            {{ $heading }}
        </h5>

        <div class="d-flex">
            <div class="card">
                <div class="card-title px-3">Profile {{ $user->role->nama }}</div>
                <div class="container mb-2">
                    <table>
                        <tr>
                            <th>Nama </th>
                            <td> : </td>
                            <td>{{ $user->nama_depan }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td> : </td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Telepon</th>
                            <td> : </td>
                            <td>{{ $user->telepon }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td> : </td>
                            <td>{{ $user->alamat }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>




        @php
            $namaView = 'accounting.user.' . $roleSlug . '.detail';
        @endphp

        @include($namaView)

    </section>
@endsection
