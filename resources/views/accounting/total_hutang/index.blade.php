@extends('layouts.main')
@section('container')
<section class="section dashboard"> 
    <div class="row">
         <!-- Hutang Sapi Card -->
         <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Hutang Sapi</h5>

                  <div class="d-flex align-items-center">
                    <div class="ps-3">
                      <label>Rp </label>
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
                      <label for="">Kredit Rp{{number_format($hutangPakan)}}</label><br>
                      <label for="">Transaksi Kredit Rp</label> </div>
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
                      <label for="">Kredit Rp{{number_format($hutangGaji)}}</label><br>
                      <label for="">Transaksi Kredit Rp</label>
                    </div>
                  </div>
                </div>

              </div>
         </div><!-- End Sales Card -->
    </div>
</section>
@endsection