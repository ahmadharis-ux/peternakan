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
    const listTransaksiKredit = {!! $listTransaksiKredit !!}

    const listTransaksiDebit = {!! $listTransaksiDebit !!}

    const listNominalTrxKredit = listTransaksiKredit.map((trx) => trx.nominal)

    const listNominalTrxDebit = listTransaksiDebit.map((trx) => trx.nominal)

    console.log(listNominalTrxDebit)
    console.log(listNominalTrxKredit)



    document.addEventListener("DOMContentLoaded", () => {
        new ApexCharts(document.querySelector("#reportsChart"), {
            series: [{
                name: 'Kredit',
                data: listNominalTrxKredit,
            }, {
                name: 'Debit',
                data: listNominalTrxDebit,
            }, ],
            chart: {
                height: 200,
                type: 'area',
                toolbar: {
                    show: false
                },
            },
            markers: {
                size: 2
            },
            colors: ['#4154f1', '#2eca6a', '#ff771d'],
            fill: {
                type: "fill",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.3,
                    opacityTo: 2,
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
