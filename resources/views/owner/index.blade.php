@extends('layouts.main')
@section('container')
<section class="section dashboard">
    <div class="row">
        <!-- Right side columns -->
        <div class="col-lg">

            <!-- Recent Activity -->
            <div class="card">

            <div class="card-body">
                <h5 class="card-title">Aktifitas Hari ini</h5>

                <div class="activity">   
                    {{-- kas --}}
                    <div class="activity-item d-flex">
                       <div class="activite-label">Pengeluaran Hari ini </div>
                       <i class='bi bi-circle-fill  activity-badge text-danger align-self-start'></i>
                       <div class="activity-content">
                       <a href="#" class="fw-bold text-dark">Rp. {{number_format($trans->sum('kredit'))}}</a>
                       </div>
                    </div><!-- End activity item-->
                    {{-- kas --}}
                    <div class="activity-item d-flex">
                       <div class="activite-label">Pemasukan Hari ini </div>
                       <i class='bi bi-circle-fill  activity-badge text-success align-self-start'></i>
                       <div class="activity-content">
                       <a href="#" class="fw-bold text-dark">Rp. {{number_format($trans->sum('debit'))}}</a>
                       </div>
                    </div><!-- End activity item-->

                </div>

            </div>
            </div><!-- End Recent Activity -->

        </div><!-- End Right side columns -->
        <!-- Left side columns -->
        <div class="col-lg">
          <div class="row">

            <!-- Hutang Card -->
            <div class="col-xxl-6 col-md-6">
              <a href="/total_hutang">
                <div class="card info-card sales-card">
  
                  <div class="card-body">
                    <h5 class="card-title">Hutang</h5>
  
                    <div class="d-flex align-items-center">
                      <div class="ps-3">
                        <h6>{{number_format($allhutang)}}</h6>
                        <h6></h6>
                      </div>
                    </div>
                  </div>
  
                </div>
              </a>
            </div><!-- End Sales Card -->

            <!-- Piutang Card -->
            <div class="col-xxl-6 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Piutang</h5>

                  <div class="d-flex align-items-center">
                    <div class="ps-3">
                      <h6>{{number_format($allpiutang)}}</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Saldo Card -->
            <div class="col-xxl-6 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Total Saldo</h5>

                  <div class="d-flex align-items-center">
                    <div class="ps-3">
                      <h6></h6>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
            <hr>
            <!-- Total Pakan Card -->
            <div class="col-xxl-6 col-md-6">
              <a href="/acc/pakan">
                <div class="card info-card sales-card">
  
                  <div class="card-body">
                    <h5 class="card-title">Total Stok Pakan</h5>
                    <div class="d-flex align-items-center">
                      <div class="ps-3">
                        <h6>{{$stokpakan}}</h6>
                      </div>
                    </div>
                  </div>
  
                </div>
              </a>
            </div><!-- End Sales Card -->
            <!-- Stok Sapi Card -->
            <div class="col-xxl-6 col-xl-12">
              <a href="/stoksapi">
                <div class="card info-card customers-card">
  
                  <div class="card-body">
                    <h5 class="card-title">Stok Sapi</h5>
                    <div class="d-flex align-items-center">
                      <div class="ps-3">
                        <h6>
                          {{$stoksapi}}
                        </h6>
                      </div>
                    </div>
  
                  </div>
                </div>
              </a>


            </div><!-- End Customers Card -->

          </div>
        </div><!-- End Left side columns -->

        

    </div>
</section>
@endsection