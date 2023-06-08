@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        <div class="row">
 
            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Hutang Card -->
                    <div class="col-xxl-8 col-md-6">
                        <a href="/acc/rincian_hutang">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Hutang</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>Rp {{ number_format($totalHutang) }}</h6>
                                            <h6></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Piutang Card -->
                    <div class="col-xxl-8 col-md-6">
                        <a href="/acc/rincian_piutang">
                            <div class="card info-card revenue-card">
                                <div class="card-body">
                                    <h5 class="card-title">Piutang</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>Rp {{ number_format($totalPiutang) }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>

                    <!-- Saldo Card -->
                    <a href="acc/total_saldo">
                        <div class="col-xxl-8 col-xl-12">
                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Saldo</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>Rp
                                                {{ number_format($totalSaldo + $jumlahNilaiPembelianPakan - $jumlahNilaiPemakaianPakan) }}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <hr>

                    <!-- Total Pakan Card -->
                    <div class="col-xxl-4 col-md-6">
                        <a href="/acc/pakan">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">Total Stok Pakan</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>[stok_pakan]</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </a>
                    </div>

                    <!-- Stok Sapi Card -->
                    <div class="col-xxl-4 col-xl-12">
                        <a href="/acc/sapi">
                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">Stok Sapi</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>{{ $stokSapi }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>


                    </div>

                    <!-- Reports -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Reports <span>/Today</span></h5>
                                <!-- Line Chart -->
                                <div id="reportsChart"></div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        new ApexCharts(document.querySelector("#reportsChart"), {
                                            series: [{
                                                name: 'Sales',
                                                data: [31, 40, 28, 51, 42, 82, 56],
                                            }, {
                                                name: 'Revenue',
                                                data: [11, 32, 45, 32, 34, 52, 41]
                                            }, {
                                                name: 'Customers',
                                                data: [15, 11, 32, 18, 9, 24, 11]
                                            }],
                                            chart: {
                                                height: 350,
                                                type: 'area',
                                                toolbar: {
                                                    show: false
                                                },
                                            },
                                            markers: {
                                                size: 4
                                            },
                                            colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                            fill: {
                                                type: "gradient",
                                                gradient: {
                                                    shadeIntensity: 1,
                                                    opacityFrom: 0.3,
                                                    opacityTo: 0.4,
                                                    stops: [0, 90, 100]
                                                }
                                            },
                                            dataLabels: {
                                                enabled: false
                                            },
                                            stroke: {
                                                curve: 'smooth',
                                                width: 2
                                            },
                                            xaxis: {
                                                type: 'datetime',
                                                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z",
                                                    "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z",
                                                    "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z",
                                                    "2018-09-19T06:30:00.000Z"
                                                ]
                                            },
                                            tooltip: {
                                                x: {
                                                    format: 'dd/MM/yy HH:mm'
                                                },
                                            }
                                        }).render();
                                    });
                                </script>
                                <!-- End Line Chart -->
                            </div>

                        </div>
                    </div>
                    <!-- End Reports -->

                </div>
            </div><!-- End Left side columns -->

            {{-- <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">

            <div class="card-body">
              <h5 class="card-title">Aktifitas Hari ini</h5>

              <div class="activity">
                @foreach ($kas or $pembayaran or $hutang as $item)
                <div class="activity-item d-flex">
                  <div class="activite-label">{{$item->created_at->diffForHumans()}}</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    {{$item->jurnal->name}} <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                  </div>
                </div><!-- End activity item-->
                @endforeach

              </div>

            </div>
          </div><!-- End Recent Activity -->

        </div><!-- End Right side columns --> --}}

        </div>
    </section>
@endsection
