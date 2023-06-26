@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        <div class="row">
            <div class="col">
                {{ $listNominalTrxKreditByDate }}
            </div>
            <div class="col">
                {{ $listNominalTrxDebitByDate }}
            </div>
        </div>

        <div class="row">



            <!-- Left side columns -->
            <div class="col">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Grafik Transaksi</h5>
                                <div class="d-block">
                                    <form action="" method="get">
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="me-1 d-block">Dari tanggal</label>
                                                <input type="date" class="form-control" name="from_date"
                                                    value="{{ $fromDate }}">
                                            </div>

                                            <div class="col">
                                                <label class="me-1 d-block">Ke tanggal</label>
                                                <input type="date" class="form-control" name="to_date"
                                                    value="{{ $toDate }}">
                                            </div>


                                        </div>
                                        <button type="submit" class="btn btn-primary ms-auto" href="#"
                                            role="button">Terapkan
                                            filter tanggal</button>
                                    </form>
                                </div>
                                <div id="reportsChart"></div>


                            </div>

                        </div>
                    </div>
                </div>
            </div><!-- End Left side columns -->



        </div>
    </section>
@endsection

{{-- @dd($dateList) --}}

<script>
    const listNominalTrxKreditByDate = {!! $listNominalTrxKreditByDate !!}
    const listNominalTrxDebitByDate = {!! $listNominalTrxDebitByDate !!}
    const dateList = {!! $dateList !!}

    console.log(listNominalTrxDebitByDate);
    console.log(listNominalTrxKreditByDate);
    console.log(dateList);

    document.addEventListener("DOMContentLoaded", () => {
        new ApexCharts(document.querySelector("#reportsChart"), {
            series: [{
                name: 'Kredit',
                data: listNominalTrxKreditByDate,
            }, {
                name: 'Debit',
                data: listNominalTrxDebitByDate,
            }, ],
            chart: {
                height: 300,
                type: 'area',
                toolbar: {
                    show: true
                },
            },
            markers: {
                size: 1
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
                enabled: true
            },
            stroke: {
                curve: 'smooth',
                width: 2
            },
            xaxis: {
                type: 'date',
                categories: dateList,
            },
            tooltip: {
                x: {
                    // format: 'dd/MM/yy HH:mm'
                },
            }
        }).render();
    });
</script>
