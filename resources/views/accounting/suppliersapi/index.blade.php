@extends('layouts.main')
@section('container')
<section class="section dashboard">
    
            <!-- Recent Sales -->
            
            <div class="row">
                @foreach ($customer as $item)    
                 <!-- Hutang Sapi Card -->
                 <div class="col-xxl-4 col-md-4">
                  <div class="card info-card sales-card">
                    <a href="/acc/pekerja/{{$item->id}}">
                      <div class="card-body profile-card d-flex flex-column align-items-center">
                        <h5 class="card-title">{{$item->role->name}}</h5>
                        <img src="{{asset('assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
                        <span class="mt-2">{{$item->name}}</span>
                      </div>
                    </a>
                  </div>
                 </div><!-- End Sales Card -->
                @endforeach
              </div><!-- End Recent Sales -->
</section>
@endsection