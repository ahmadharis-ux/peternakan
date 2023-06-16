@php
    $listDetailPenjualan = $debit->penjualanSapi->detailPenjualanSapi;
    $listOperasionalPenjualan = $debit->penjualanSapi->operasionalPenjualanSapi;
@endphp


@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        <h5>
            {{ $heading }}
        </h5>

        {{-- id piutang --}}
        <div class="fs-5">
            <span>ID piutang : </span>
            <span class="fw-bold"> {{ $debit->id }}</span>
        </div>

        {{-- table sapi dibeli --}}
        <div class="card recent-sales">
            <div class="card-title px-3">List sapi dibeli</div>
            <div class="card-body">
                {{-- detail penjualan sapi --}}
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Eartag</th>
                            <th scope="col" class="text-end">Bobot</th>
                            <th scope="col" class="pe-5 text-end">Harga</th>
                            <th scope="col" class="text-center">Diambil</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listDetailPenjualan as $item)
                            @php
                                $sapiDiambil = $item->sapi->status == 'SOLD';

                            @endphp
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                <td>{{ $item->sapi->eartag }}</td>
                                <td class="text-end">{{ $item->bobot }} kg</td>
                                <td class="text-end">Rp {{ number_format($item->harga) }}</td>
                                <td class="text-center">

                                    @if ($sapiDiambil)
                                        <span>Sapi sudah diambil</span>
                                        <i class="bi bi-check"></i>
                                    @else
                                        <form action="/acc/sapi/{{ $item->id_sapi }}/ambil" method="post">
                                            @csrf
                                            @method('put')

                                            <input type="submit" class="btn btn-sm btn-primary" value="Ambil sapi">
                                        </form>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                        <tr style="background-color: rgb(235, 235, 235)">
                            <th colspan="4">Total</th>
                            <td class="text-end fw-bold">Rp {{ number_format($listDetailPenjualan->sum('harga')) }}</td>
                        </tr>
                    </tbody>
                </table>



            </div>
        </div>


        {{-- table operasional --}}
        <div class="card recent-sales">
            <div class="card-title px-3">List operasional</div>
            <div class="card-body ">

                {{-- list operasional --}}
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col" class="text-end">Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listOperasionalPenjualan as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td class="text-end">{{ number_format($item->harga) }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <th colspan="3">Subtotal</th>
                            <td class="fw-bold text-end">Rp {{ number_format($listOperasionalPenjualan->sum('harga')) }}
                            </td>
                        </tr>
                    </tbody>
                </table>


            </div>
        </div>
    </section>
@endsection
