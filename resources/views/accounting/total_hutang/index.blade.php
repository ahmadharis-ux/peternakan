@extends('layouts.main')
@section('container')
<section class="section dashboard">
    <h5>Detail Hutang</h5>
    <div class="row">
         <!-- Hutang Sapi Card -->
         <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Hutang Sapi</h5>

                  <div class="d-flex align-items-center">
                    <div class="ps-3">
                      <h6>{{number_format($allsapi)}}</h6>
                      <h6></h6>
                    </div>
                  </div>
                </div>

              </div>
         </div><!-- End Sales Card -->
         <!-- Hutang Sapi Card -->
         <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Hutang Pakan</h5>

                  <div class="d-flex align-items-center">
                    <div class="ps-3">
                      <h6>{{number_format($allpakan)}}</h6>
                      <h6></h6>
                    </div>
                  </div>
                </div>

              </div>
         </div><!-- End Sales Card -->
         <!-- Hutang Sapi Card -->
         <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Hutang Gaji Pekerja</h5>

                  <div class="d-flex align-items-center">
                    <div class="ps-3">
                      <h6>{{number_format(0,2)}}</h6>
                      <h6></h6>
                    </div>
                  </div>
                </div>

              </div>
         </div><!-- End Sales Card -->
    </div>
</section>
@endsection