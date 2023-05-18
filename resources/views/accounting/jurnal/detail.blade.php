@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">{{ $heading }} </h5>
                    <div class="container mb-3">
                        {{-- {{ $jurnal }} --}}

                        <div class="col-md-6">

                            <form action="/acc/jurnal/{{ $jurnal->id }}" method="POST" class="disabled">
                                @method('PUT')
                                @csrf

                                <div class="row mb-3">
                                    <label for="colFormLabel" class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Kode jurnal</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" name="id_kode_jurnal">
                                            @foreach ($listKodeJurnal as $kodeJurnal)
                                                <option value="{{ $kodeJurnal->id }}">{{ $kodeJurnal->kode }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <button class="btn btn-primary">Edit</button>
                                <button class="btn btn-primary">Sim</button>
                            </form>
                        </div>

                    </div>
                    <hr>

                </div>

            </div>
        </div>
    </section>
@endsection
