<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $nomorFaktur }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">


    <style>
        html {
            box-sizing: border-box;
            --accent-color: #2E3E4E;
        }

        body {
            background-color: white;
        }

        #inv {
            color: var(--accent-color);
        }

        * {
            /* border: 1px solid black */
        }

        thead {
            background-color: var(--accent-color);
            color: white;
        }

        .centered {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%;
        }

        .container {
            margin-bottom: 300px;
        }
    </style>

    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

</head>

<body>
    <div class="container mt-3 py-3">

        {{-- header --}}
        <div class="d-flex justify-content-between">

            <img src="{{ asset('logo.svg') }}" class="mt-3" width="200px" alt="">

            {{-- kpp surat --}}
            <div class="d-flex flex-column justify-content-start">
                <h2 class="text-end" id="inv">Invoice</h2>
                <div class="d-flex flex-column mt-3" style="width: 400px">

                    <div class="d-flex justify-content-between">
                        <span class="fw-bold">Referensi</span>
                        <span>{{ $nomorFaktur }}</span>
                    </div>

                    <div class="d-flex justify-content-between">
                        <span class="fw-bold">Tanggal</span>
                        <span>{{ carbonToday() }}</span>
                    </div>

                    <div class="d-flex justify-content-between">
                        <span class="fw-bold">Jatuh Tempo</span>
                        <span> {{ $jatuhTempo }}</span>
                    </div>

                    <div class="d-flex justify-content-between">
                        <span class="fw-bold">Subjek</span>
                        <span style="max-width: 200px">{{ $subjek }}</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- info pengirim/penerima --}}
        <div class="d-flex justify-content-between mt-5">

            {{-- info perusahaan --}}
            <div class="d-flex flex-column" style="width:40%">
                <span class="fw-bold">Info Perusahaan</span>
                <hr>
                <div class="d-flex flex-column">
                    <span class="fw-bold my-2">divascow</span>
                    <span>Jalan maribaya timur, Kp. Sukamaju, Rt 01 Rw 14, Desa Cibodas,</span>
                    <span>Kab. Bandung Barat,</span>
                    <span>Jawa Barat, 40391</span>
                    <span>INDONESIA</span>
                    <span>Telp: {{ $author->telepon }}</span>
                    <span>Email: {{ $author->email }}</span>
                </div>
            </div>

            @php
                $isKredit = isset($kredit);
            @endphp

            {{-- penerima/pengirim tagihan --}}
            <div class="d-flex flex-column" style="width:40%">
                <span class="fw-bold">Tagihan {{ $isKredit ? 'dari' : 'untuk' }}</span>
                <hr>
                <div class="d-flex flex-column">
                    @php
                        $pk = ($isKredit ? $kredit : $debit)->pihakKedua;
                    @endphp
                    <span class="fw-bold my-2">{{ getUserFullname($pk) }}</span>
                    <span>{{ $pk->email }}</span>
                    <span>{{ $pk->telepon }}</span>
                    <span>{{ $pk->alamat }}</span>
                </div>
            </div>
        </div>

        {{-- list detail penjualan/pembelian --}}
        <div class="mt-5">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Produk</th>
                        <th class="text-center">Kuantitas</th>
                        <th class="text-end">Harga</th>
                        <th class="text-center">Diskon</th>
                        <th class="text-center">Pajak</th>
                        <th class="text-end">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @yield('listItemTransaksi')
                </tbody>
            </table>
        </div>

        {{-- rekapan transaksi --}}
        <div class="mt-5">
            <div class="d-flex flex-column col-6 ms-auto">
                <div class="d-flex justify-content-between">
                    <span class="fw-bold">Subtotal</span>
                    <span>Rp @yield('subtotal')</span>
                </div>

                <div class="d-flex justify-content-between">
                    <span class="fw-bold">Pajak</span>
                    <span>Rp @yield('pajak')</span>
                </div>

                <div class="d-flex justify-content-between">
                    <span class="fw-bold">Total</span>
                    <span>Rp @yield('total')</span>
                </div>

                <div class="d-flex justify-content-between">
                    <span class="fw-bold">Tunai</span>
                    <span>Rp @yield('tunai')</span>
                </div>

                <hr>

                <div class="d-flex justify-content-between fw-bold fs-5">
                    <span>Sisa Tagihan</span>
                    <span>Rp @yield('sisaTagihan')</span>
                </div>
            </div>
        </div>

        {{-- keterangan dan tanda tangan --}}
        <div style="margin-top: 150px">
            <div class="d-flex justify-content-between">
                {{-- keterangan --}}
                <div class="col-7">
                    <div class="d-flex flex-column">
                        <span class="fw-bold fs-5">Keterangan</span>
                        <span>
                            <hr>
                        </span>
                        <span>@yield('keterangan')</span>
                    </div>

                </div>

                {{-- tanda tangan --}}
                <div class="col text-center">
                    <div class="d-flex flex-column justify-content-start align-items-center">
                        <span class="fw-bold"> {{ tanggalSekarang() }}</span>
                        <div>
                            <img src="{{ asset('logo.svg') }}" width="150px" class="my-3" style="opacity: .2">
                        </div>
                        <span class="fw-bold"> {{ getUserFullname($author) }}</span>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <script>
        // window.print();
    </script>
</body>

</html>
