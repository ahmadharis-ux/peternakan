@extends('layouts.main')
@section('container')
    <section class="section dashboard">

        {{-- table pakan --}}
        <div class="card recent-sales overflow-auto">
            <div class="card-body p-3">

                <div class="d-flex flex-row">
                    <div class="d-flex flex-column" style="width: 70%">
                        {{-- Pilih pakan --}}
                        @include('accounting.pemakaian_pakan.tableListStokPakan')

                        <div class="my-5">
                            <hr>
                        </div>

                        {{-- table pilih sapi --}}
                        @include('accounting.pemakaian_pakan.tablePilihSapi')

                    </div>

                    @include('accounting.pemakaian_pakan.tableInfoPemakaianPakan')
                </div>
            </div>
        </div>
    </section>



    {{-- modals --}}
    {{-- modal pilih pakan --}}
    {{-- modal pilih sapi --}}
@endsection
