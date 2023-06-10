<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $title ?? 'Faktur' }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    {{-- jquery offline --}}
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/echarts@5.3.0/dist/echarts.min.js"></script>

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

</head>

<body>
    <div class="container py-3 mt-3">

        {{-- header --}}
        <div class="d-flex justify-content-between">

            <img src="{{ asset('logo.svg') }}" class="mt-3" width="200px    " alt="">

            {{-- kpp surat --}}
            <div class="d-flex flex-column justify-content-start">
                <h2 class="text-end" id="inv">Invoice</h2>
                <div class="mt-3 d-flex flex-column" style="width: 300px">

                    <div class="d-flex justify-content-between">
                        <span class="fw-bold">Referensi</span>
                        <span>
                            @yield('refInvoice')
                        </span>
                    </div>

                    <div class="d-flex justify-content-between">
                        <span class="fw-bold">Tanggal</span>
                        <span>@yield('tanggalInvoice')</span>
                    </div>

                    <div class="d-flex justify-content-between">
                        <span class="fw-bold">Jatuh Tempo</span>
                        <span>@yield('jatuhTempoInvoice')</span>
                    </div>

                    <div class="d-flex justify-content-between">
                        <span class="fw-bold">Subjek</span>
                        <span>@yield('subjek')</span>
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
                    <span>Telp: 08979974550</span>
                    <span>Email: divanurafifah111@gmail.com</span>
                </div>
            </div>

            {{-- penerima/pengirim tagihan --}}
            <div class="d-flex flex-column" style="width:40%">
                <span class="fw-bold">Tagihan Untuk</span>
                <hr>
                <div class="d-flex flex-column">
                    @yield('infoPenerimaTagihan')
                </div>
            </div>
        </div>

        {{-- list detail penjualan/pembelian --}}
        <div class="mt-5">
            <table class="table table-bordered border-grey">
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
                    <div class="d-flex flex-column  justify-content-start align-items-center">
                        <span class="fw-bold">@yield('tanggalTtd')</span>
                        <div>
                            <img src="{{ asset('logo.svg') }}" width="150px" class="my-3">
                        </div>
                        <span class="fw-bold">@yield('penanggungJawab')</span>
                    </div>
                </div>

            </div>
        </div>

    </div>

</body>

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
