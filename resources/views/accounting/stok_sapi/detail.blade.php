@extends('layouts.main')
@section('container')

@php
    // dd(getDetailPenjualanSapibyId(3));
    // echo carbonNow();
    $penjualanSapi = getDetailPenjualanSapibyId($sapi->id);

@endphp
    <section class="section dashboard">
        <div class="col-12">

            {{-- card --}}
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">{{ $heading }} </h5>
                    <div class="container mb-3">
                        {{ $sapi }}
                    </div>
                </div>
            </div>

            {{-- Riwayat bobot dan pemberian pakan --}}
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">Riwayat pemberian pakan</h5>
                    <div class="container mb-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Tanggal</td>
                                    <td>Nominal Pakan</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sapi->markup as $riwayatpemberianpakan)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$riwayatpemberianpakan->created_at}}</td>
                                        <td>Rp {{number_format($riwayatpemberianpakan->markup_pembulatan)}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Pembelian / penjualan --}}
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">Pembelian / penjualan</h5>
                    <div class="container mb-3">
                        <div class="row">
                            <div class="col">
                                @if ($sapi->status == "DIBELI")
                                    <?php 
                                        $hargajual = $sapi->detailPenjualanSapi->sum('harga');
                                        $hargapokok = $sapi->harga_pokok + $sapi->markup->sum('markup_pembulatan');
                                        $labakotor = $sapi->detailPenjualanSapi->sum('harga') - ($sapi->harga_pokok + $sapi->markup->sum('markup_pembulatan'));
                                        $biayapakansebelumdiambil = $sapi->markupSapi()
                                                ->whereDate('created_at', '>', $penjualanSapi->created_at)
                                                ->sum('markup_pembulatan');
                                        $lababersih = $labakotor - $biayapakansebelumdiambil;
                                    ?>
                                <label for="">Penjualan  {{getDetailPenjualanSapibyId($sapi->id)->created_at}}</label><br>
                                    <label for="">Harga Jual : </label> Rp {{ number_format($hargajual) }}
                                    <br>
                                    <label for="">Harga Pokok : </label> Rp {{ number_format( $hargapokok) }}
                                    <br>
                                    <label for="">Laba Kotor: </label> Rp {{ number_format(  $labakotor) }}
                                    <br>
                                        @if ($riwayatpemberianpakan->created_at > getDetailPenjualanSapibyId($sapi->id)->created_at )
                                            <label for="">Biaya Pakan Sebelum Di Ambil : Rp {{number_format($biayapakansebelumdiambil)}} </label>
                                        @else
                                          
                                        @endif
                                    <br>
                                    <label for="">Laba Bersih: </label> Rp {{ number_format($lababersih) }}
                                    <br>
                                @else
                                    <label for="">Belum Terjual</label>
                                @endif
                            </div>
                            <div class="col">
                                <label for="">Pembelian</label><br>
                            </div>
                        </div>
                        {{-- {{ $sapi }} --}}
                       
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection
