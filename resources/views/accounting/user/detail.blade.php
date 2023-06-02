@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        {{-- {{ $user }} --}}
        <h5>
            {{ $heading }}
        </h5>

        @php
            $userRole = strtolower($user->role->nama);
            $namaView = 'accounting.user.' . $userRole . '.detail';
        @endphp

        @include($namaView)

    </section>
@endsection
