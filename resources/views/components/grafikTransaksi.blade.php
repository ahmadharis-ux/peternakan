<div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Grafik Transaksi</h5>
            <div class="d-block">
                <form action="" method="get">
                    <div class="row mb-3">
                        <div class="col">
                            <label class="me-1 d-block">Dari tanggal</label>
                            <input type="date" class="form-control" name="from_date"
                                value="{{ $dataGrafikTransaksi->fromDate }}">
                        </div>

                        <div class="col">
                            <label class="me-1 d-block">Ke tanggal</label>
                            <input type="date" class="form-control" name="to_date"
                                value="{{ $dataGrafikTransaksi->toDate }}">
                        </div>


                    </div>
                    <div class="d-flex justify-content-end my-3">
                        <button type="button" class="btn btn-secondary me-1" onclick="resetGrafik()">Reset
                            filter</button>
                        <button type="submit" class="btn btn-primary" role="button">Terapkan
                            filter tanggal</button>

                    </div>
                </form>
            </div>
            <div id="reportsChart"></div>


        </div>

    </div>


    <script>
        function resetGrafik() {
            let path = window.location.href.split('?')[0]
            window.location = path;
        }

        const listNominalTrxKreditByDate = {!! $dataGrafikTransaksi->trxKredit !!}
        const listNominalTrxDebitByDate = {!! $dataGrafikTransaksi->trxDebit !!}
        const dateList = {!! $dataGrafikTransaksi->dateList !!}

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
</div>
