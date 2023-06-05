@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        <div class="row">
            <div class="col">
                {{ $listTransaksiKredit }}
            </div>
            <div class="col">
                {{ $listTransaksiDebit }}
            </div>
        </div>

        <div class="row">



            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">


                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Kredit</h5>
                                <div id="reportsChart"></div>


                            </div>

                        </div>
                    </div>
                </div>
            </div><!-- End Left side columns -->



        </div>
    </section>
@endsection


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
                height: 200,
                type: 'bar',
                toolbar: {
                    show: false
                },
            },
            markers: {
                size: 2
            },
            colors: ['#4154f1', '#2eca6a', '#ff771d'],
            fill: {
                type: "solid",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 1,
                    opacityTo: 1,
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