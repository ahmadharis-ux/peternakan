<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Cetak faktur</title>
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



    <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<div class="container py-3 mt-3">

    {{-- header --}}
    <div class="d-flex justify-content-between">

        <img src="{{ asset('logo.svg') }}" class="mt-3" width="200px" alt="">

        {{-- kpp surat --}}
        <div class="d-flex flex-column justify-content-start">
            <h2 class="text-end text-primary">Invoice</h2>
            <div class="mt-3 d-flex flex-column" style="width: 300px">

                <div class="d-flex justify-content-between">
                    <span class="fw-bold">Referensi</span>
                    <span>INV/2023/0005</span>
                </div>

                <div class="d-flex justify-content-between">
                    <span class="fw-bold">Tanggal</span>
                    <span>16/05/2023</span>
                </div>

                <div class="d-flex justify-content-between">
                    <span class="fw-bold">Jatuh Tempo</span>
                    <span>15/07/2023</span>
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

        {{-- penerima tagihan --}}
        <div class="d-flex flex-column" style="width:40%">
            <span class="fw-bold">Tagihan Untuk</span>
            <hr>
            <div class="d-flex flex-column">
                <span class="fw-bold my-2">Pak Bowo</span>
                <span>Telp: 087871544509</span>

            </div>
        </div>
    </div>

    {{-- list detail penjualan sapi --}}
    <div class="mt-5">
        <table class="table table-bordered border-grey">
            <thead class="table-dark">
                <tr>
                    <th>Produk</th>
                    <th class="text-center">Kuantitas</th>
                    <th class="text-end">Harga</th>
                    <th>Diskon</th>
                    <th>Pajak</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < 22; $i++)
                    <tr>
                        <td class="d-flex flex-column">
                            <span class="fw-bold">12/070D</span>
                            <span>Sapi Madura</span>
                        </td>
                        <td>
                            <div class="centered">1</div>
                        </td>
                        <td class="text-end">15,700,000.00</td>
                        <td class="text-center">0%</td>
                        <td class="text-center">-</td>
                        <td class="text-end">16,200,000.00</td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>

    {{-- rekapan transaksi --}}
    <div class="mt-5">
        <div class="d-flex flex-column col-6 ms-auto">
            <div class="d-flex justify-content-between">
                <span class="fw-bold">Subtotal</span>
                <span>Rp [subtotal]</span>
            </div>

            <div class="d-flex justify-content-between">
                <span class="fw-bold">Pajak</span>
                <span>Rp [pajak]</span>
            </div>

            <div class="d-flex justify-content-between">
                <span class="fw-bold">Total</span>
                <span>Rp [total]</span>
            </div>

            <hr>

            <div class="d-flex justify-content-between fw-bold">
                <span>Sisa Tagihan</span>
                <span>Rp [sisa Tagihan]</span>
            </div>
        </div>
    </div>

    {{-- keterangan dan tanda tangan --}}
    <div style="margin-top: 150px">
        <div class="d-flex justify-content-between">
            {{-- keterangan --}}
            <div class="col-7">
                <div class="d-flex flex-column">
                    <span class="fw-bold">Keterangan</span>
                    <span>
                        <hr>
                    </span>
                    <span>[keterangan]</span>
                </div>

            </div>

            {{-- tanda tangan --}}
            <div class="col text-center">
                <div class="d-flex flex-column  justify-content-start align-items-center">
                    <span class="fw-bold">[tanggal]</span>
                    <img src="{{ asset('logo.svg') }}" width="150px" class="my-3">
                    <span class="fw-bold">[penanggung jawab]</span>


                </div>
            </div>

        </div>
    </div>

</div>

<style>
    html {
        box-sizing: border-box;
    }

    * {
        /* border: 1px solid black */
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
