@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">List pekerja</h5>


                    <div class="container mb-3">
                    </div>
                    <hr>
                    {{-- table --}}
                    @include('accounting.penggajian.tableListPekerja')

                </div>

            </div>
        </div>
    </section>
@endsection
