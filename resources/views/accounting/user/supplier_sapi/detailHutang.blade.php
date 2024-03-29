@php
    $listDetailPembelian = $kredit->pembelianSapi->detailPembelianSapi;
    $listOperasionalPembelian = $kredit->pembelianSapi->operasionalPembelianSapi;
    
    $userIsAuthor = $kredit->id_author == auth()->user()->id;
    $userPunyaTtd = auth()->user()->foto_ttd !== null;
@endphp


@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        <h5>
            {{ $heading }}
        </h5>


        <div class="d-flex justify-content-between mb-3">
            {{-- id hutang --}}
            <div class="fs-5">
                <span>ID hutang : </span>
                <span class="fw-bold"> {{ $kredit->id }}</span>
            </div>

            {{-- btn cetak faktur --}}
            <div class="d-flex justify-content-end">
                @if ($userIsAuthor)
                    <div class="d-flex flex-column">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary {{ $userPunyaTtd ? '' : 'disabled btn-secondary' }}"
                                data-bs-toggle="modal" data-bs-target="#modalCetakFaktur">Cetak
                                faktur</button>
                        </div>
                        @if ($userPunyaTtd == false)
                            <small class="text-muted">Anda belum punya tanda tangan. <a href="/editprofile">Upload
                                    di sini</a></small>
                        @endif
                    </div>
                @endif
            </div>

        </div>


        {{-- table sapi dibeli --}}
        <div class="card recent-sales">
            <div class="card-title px-3">List sapi dibeli</div>
            <div class="card-body">
                {{-- detail pembelian sapi --}}
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Eartag</th>
                            <th scope="col" class="text-end">Bobot</th>
                            <th scope="col" class="pe-5 text-end">Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listDetailPembelian as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                <td>{{ $item->eartag }}</td>
                                <td class="text-end">{{ $item->bobot }} kg</td>
                                <td class="text-end">Rp {{ number_format($item->harga) }}</td>

                            </tr>
                        @endforeach
                        <tr style="background-color: rgb(235, 235, 235)">
                            <th colspan="4">Total</th>
                            <td class="fw-bold text-end">Rp {{ number_format($listDetailPembelian->sum('harga')) }}</td>
                        </tr>
                    </tbody>
                </table>



            </div>
        </div>


        {{-- table operasional --}}
        <div class="card recent-sales">
            <div class="card-title px-3">List operasional</div>
            <div class="card-body">

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
                        @foreach ($listOperasionalPembelian as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td class="text-end">{{ number_format($item->harga) }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <th colspan="3">Subtotal</th>
                            <td class="fw-bold text-end">Rp {{ number_format($listOperasionalPembelian->sum('harga')) }}
                            </td>
                        </tr>
                    </tbody>
                </table>


            </div>
        </div>

        {{-- table transaksi --}}
        <div class="card recent-sales">
            <div class="card-title px-3">Riwayat transaksi</div>
            <div class="card-body">
                @php
                    $sumNominal = $listRiwayatTransaksi->sum('nominal');
                    $sumAdm = $listRiwayatTransaksi->sum('adm');
                    
                    $totalBayar = number_format($sumNominal);
                    $totalIncludeAdm = number_format($sumNominal + $sumAdm);
                @endphp


                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tanggal</th>
                            {{-- <th scope="col">Keterangn</th> --}}
                            <th scope="col" class="text-center">Adm</th>
                            <th scope="col" class="text-center">Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listRiwayatTransaksi as $trx)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $trx->created_at }}</td>
                                <td class="text-secondary text-end">{{ number_format($trx->adm) }}</td>
                                <td class="text-end">{{ number_format($trx->nominal) }}</td>

                            </tr>
                        @endforeach
                        <tr>
                            <th colspan="2">Total</th>
                            <td class="text-secondary fw-bold text-end">Rp {{ number_format($sumAdm) }}</td>
                            <td class="fw-bold text-end">Rp {{ $totalBayar }}</td>
                        </tr>
                        <tr class="text-secondary">
                            <td colspan="3">Include adm</td>
                            <td class="text-end">Rp {{ $totalIncludeAdm }}</td>
                        </tr>

            </div>
            </table>

        </div>
        </div>

        @if ($userIsAuthor)
            @include('accounting.pembelian_sapi.modalCetakFaktur')
        @endif

    </section>
@endsection
