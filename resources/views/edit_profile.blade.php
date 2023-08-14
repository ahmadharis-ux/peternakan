@extends('layouts.main')
@section('container')
    <section class="section">
        <div class="row">
            <div class="col col-lg-8 mx-auto">

                <div class="card">
                    <div class="card-header">
                        Form Edit Profile
                    </div>
                    <form action="/updateprofile" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">

                            <div class="row mb-2">
                                <div class="col">
                                    <label style="font-size: 12px">Nama Depan</label>
                                    <input name="nama_depan" type="text" class="form-control form-control-sm"
                                        value="{{ auth()->user()->nama_depan }}">
                                </div>
                                <div class="col">
                                    <label style="font-size: 12px">Nama Belakang</label>
                                    <input name="nama_belakang" type="text" class="form-control form-control-sm"
                                        value="{{ auth()->user()->nama_belakang }}">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col">
                                    <label style="font-size: 12px">Perusahaan</label>
                                    <input type="text" class="form-control form-control-sm" value="Diva's Cow" disabled>
                                </div>
                                <div class="col">
                                    <label style="font-size: 12px">Job</label>
                                    <input type="text" class="form-control form-control-sm"
                                        value="{{ auth()->user()->role->nama }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col">
                                    <label style="font-size: 12px">Telepon</label>
                                    <input name="telepon" type="text" class="form-control form-control-sm"
                                        value="{{ auth()->user()->telepon }}">
                                </div>
                                <div class="col">
                                    <label style="font-size: 12px">Email</label>
                                    <input name="email" type="text" class="form-control form-control-sm"
                                        value="{{ auth()->user()->email }}">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col" style="width: max-content">
                                    <label style="font-size: 12px">Alamat</label>
                                    <input name="alamat" type="text" class="form-control form-control-sm"
                                        value="{{ auth()->user()->alamat }}">
                                </div>
                            </div>

                            {{-- foto --}}
                            <div class="row my-3">

                                <div class="col d-flex flex-column align-items-center" style="width: max-content">
                                    <label>Foto profil</label>
                                    <div class="gambar-ttd my-2">
                                        <img src="/foto_profil/{{ auth()->user()->id }}" id="previewImage">
                                    </div>
                                    <input name="foto_profil" type="file" id="myFile" class="button-file" />
                                </div>

                                <div class="col d-flex flex-column align-items-center" style="width: max-content">
                                    <label>Tanda Tangan</label>
                                    <div class="gambar-ttd my-2">
                                        <img src="/foto_ttd/{{ auth()->user()->id }}" id="previewImage1">
                                    </div>
                                    <input name="foto_ttd" type="file" id="myFile1" class="button-file" />
                                </div>


                            </div>
                            <div class="d-block mt-5 text-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </section>
    <style>
        * {
            /* border: 1px red solid; */
        }

        .text-center {
            display: flex;
            justify-content: center;
        }

        .gambar-ttd {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            justify-content: center;
            /* margin-left: 200px; */
            border: 1px solid rgb(6, 41, 75);
        }

        .gambar-ttd img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .button-simpan {
            background: rgb(8, 149, 224);
            color: white;
            border-radius: 5px;
            margin-top: 5px;
            width: 100px;
            border: 0px;
            margin-left: 500px
        }

        .button-file {
            width: 102px;
            /* margin-top: 5px; */
            /* margin-left: 15.5em; */
        }
    </style>
@endsection
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('myFile').addEventListener('change', function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById('previewImage').src = e.target.result;
                };

                reader.readAsDataURL(file);
            }
        });

        document.getElementById('myFile1').addEventListener('change', function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById('previewImage1').src = e.target.result;
                };

                reader.readAsDataURL(file);
            }
        });
    });
</script>
