@extends('layouts.main')
@section('container')

    @php
        $detailPenjualanSapi
    @endphp
    <section class="section dashboard">
        <div class="col-12">

            {{-- card --}}
            <div class="card recent-sales col-md-6 overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">{{ $heading }} </h5>
                    <div id="container-detail-sapi" class="fw-bold container mb-3">
                        <div class="d-flex justify-content-between p-2">
                            <div>ID</div>
                            <div>{{ $sapi->id }}</div>
                        </div>

                        <div class="d-flex justify-content-between p-2">
                            <div>Eartag</div>
                            <div>{{ $sapi->eartag }}</div>
                        </div>

                        <div class="d-flex justify-content-between p-2">
                            <div>Jenis</div>
                            <div>{{ $sapi->jenisSapi->nama }}</div>
                        </div>


                        <div class="d-flex justify-content-between p-2">
                            <div>Status</div>
                            <div>{{ $sapi->status }}</div>
                        </div>

                        <div class="d-flex justify-content-between p-2">
                            <div>bobot</div>
                            <div>{{ $sapi->bobot }}</div>
                        </div>


                        <div class="d-flex justify-content-between p-2">
                            <div>Jenis kelamin</div>
                            <div>{{ $sapi->jenis_kelamin }}</div>
                        </div>
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
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $riwayatpemberianpakan->created_at }}</td>
                                        <td>Rp {{ number_format($riwayatpemberianpakan->markup_pembulatan) }}</td>
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
                                @if ($sapi->status == 'DIBELI')
                                    @php
                                        $hargajual = $sapi->detailPenjualanSapi->sum('harga');
                                        $hargapokok = $sapi->harga_pokok + $sapi->markup->sum('markup_pembulatan');
                                        $labakotor = $sapi->detailPenjualanSapi->sum('harga') - $hargapokok;
                                        
                                        $biayapakansebelumdiambil = $sapi
                                            ->markupSapi()
                                            ->whereDate('created_at', '>', $penjualanSapi->created_at)
                                            ->sum('markup_pembulatan');
                                        
                                        $lababersih = $labakotor - $biayapakansebelumdiambil;
                                    @endphp

                                    <label>Penjualan {{ $detailPenjualanSapi->created_at }}</label>
                                    <br>
                                    <label>Harga Jual : </label> Rp {{ number_format($hargajual) }}
                                    <br>
                                    <label>Harga Pokok : </label> Rp {{ number_format($hargapokok) }}
                                    <br>
                                    <label>Laba Kotor: </label> Rp {{ number_format($labakotor) }}
                                    <br>
                                    @if ($riwayatpemberianpakan->created_at > $sapi->detailPenjualanSapi()->created_at)
                                        <label>Biaya Pakan Sebelum Di Ambil : Rp
                                            {{ number_format($biayapakansebelumdiambil) }} </label>
                                    @else
                                    @endif
                                    <br>
                                    <label>Laba Bersih: </label> Rp {{ number_format($lababersih) }}
                                    <br>
                                @else
                                    <label>Belum Terjual</label>
                                @endif
                            </div>
                            <div class="col">
                                <label>Pembelian</label><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <style>
            #container-detail-sapi>div:nth-child(odd) {
                background-color: rgb(236, 236, 236)
            }
        </style>
    </section>
@endsection
