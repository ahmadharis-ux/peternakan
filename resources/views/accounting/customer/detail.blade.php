@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        @for ($i = 0; $i < $jumlah_customer; $i++)
            <div class="col-xxl-4 col-md-6">
                <a href="/detail/kas/[item->jurnal->id]/[kas->id]">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Transaksi
                                <small>[tanggal_transaksi]</small>
                            </h5>

                            <div class="d-flex align-items-center">
                                <div class="ps-3">
                                    <h6>[keterangan_kas]</h6>
                                    <a href="/faktur/[kas->id]" class="btn btn-secondary btn-sm mt-2">Cetak
                                        Faktur</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </a>
            </div>
        @endfor

        {{-- @foreach ($kas as $item)
            <div class="col-xxl-4 col-md-6">
                <a href="/detail/kas/{{ $item->jurnal->id }}/{{ $item->id }}">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Transaksi
                                <small>{{ date('d - F - Y', strtotime($item->tanggal)) }}</small>
                            </h5>

                            <div class="d-flex align-items-center">
                                <div class="ps-3">
                                    <h6>{{ $item->keterangan }}</h6>
                                    <a href="/faktur/{{ $item->id }}" class="btn btn-secondary btn-sm mt-2">Cetak
                                        Faktur</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </a>
            </div>
        @endforeach --}}
    </section>
@endsection
