@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
                        <h2>{{ $data->name }}</h2>
                        <span>{{ $data->role->name }}</span>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Gaji</button>
                            </li>


                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Kashbon</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title"><span>{{ $date }}</span></h5>
                                <div class="card">
                                    @foreach ($datagaji as $item)
                                        <div class="row mx-2">
                                            <div class="col-sm">{{ date('d-F-Y', strtotime($item->created_at)) }}</div>
                                            <div class="col-sm">{{ $item->keterangan }}</div>
                                            <div class="col-sm justify-content-end">
                                                {{ number_format($item->pembayaran->sum('kredits')) }}
                                            </div>
                                            <hr>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="tab-pane fade" id="profile-change-password">
                                <h5 class="card-title"><span>{{ $date }}</span></h5>
                                <div class="card">
                                    @foreach ($datakasbon as $item)
                                        <div class="row mx-2">
                                            <div class="col-sm">{{ date('d-F-Y', strtotime($item->created_at)) }}</div>
                                            <div class="col-sm justify-content-end">
                                                {{ number_format($item->nominal) }}
                                            </div>
                                            <hr>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
