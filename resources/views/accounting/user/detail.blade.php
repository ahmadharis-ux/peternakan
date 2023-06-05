@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        <h5>
            {{ $heading }}
        </h5>

        @php
            $namaView = 'accounting.user.' . $roleSlug . '.detail';
        @endphp

        @include($namaView)

    </section>
@endsection
