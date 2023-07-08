@extends('layouts.main')
@section('container')
    @include('components.alert')


    <section class="section profile">


        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card d-flex flex-column align-items-center pt-4">
                        <img src="{{ get_profil_pic() }}" width="100px" height="100px" class="img-cropped rounded-circle my-3">
                        <h2>{{ auth()->user()->name }}</h2>
                        <span>{{ auth()->user()->role->name }}</span>
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
                                    data-bs-target="#profile-overview">Overview</button>
                            </li>


                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Change Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nama</div>
                                    <div class="col-lg-9 col-md-8">{{ auth()->user()->fullname() }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Perusahaan</div>
                                    <div class="col-lg-9 col-md-8">Diva's Cow</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Role</div>
                                    <div class="col-lg-9 col-md-8">{{ auth()->user()->role->nama }}</div>
                                </div>
                                {{--
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Negara</div>
                                    <div class="col-lg-9 col-md-8">INDONESIA</div>
                                </div> --}}

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Alamat</div>
                                    <div class="col-lg-9 col-md-8">A108 Adam Street, New York, NY 535022</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Telepon</div>
                                    <div class="col-lg-9 col-md-8">{{ auth()->user()->telepon }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{ auth()->user()->email }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Tanda tangan</div>
                                    <div class="col-lg-9 col-md-8">
                                        @if (get_ttd())
                                            <img src="{{ get_ttd() }}" width="150px" class="my-3">
                                        @else
                                            <span class="text-muted">(Belum ada tanda tangan)</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ms-auto">
                                        <a href="/editprofile" class="btn btn-warning text-white">Edit
                                            Profil</a>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form method="post" action="/changepass">
                                    @csrf
                                    @method('put')
                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="oldpassword" type="password" class="form-control"
                                                id="currentPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control" id="newPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="renewpassword" type="password" class="form-control"
                                                id="renewPassword">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button id="btnSubmit" type="submit" class="btn disabled btn-primary">Change
                                            Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            const oldPass = $("input[name=oldpassword]")
            const newpassword = $("input[name=newpassword]")
            const renewpassword = $("input[name=renewpassword]")

            function validate() {
                if (oldPass.val() == '') return false;
                return newpassword.val() === renewpassword.val();
            }

            $("input").keyup(function() {
                if (validate()) {
                    $("#btnSubmit").removeClass('disabled')
                    return
                }

                $("#btnSubmit").addClass('disabled')

            })
        })
    </script>
@endsection
