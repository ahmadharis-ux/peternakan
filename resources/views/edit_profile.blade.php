@extends('layouts.main')
@section('container')
<section class="section profile">
  <div class="row" style="align-content: center; padding-left:15em;padding-right:15em">
    <div class="col">

      <div class="card">
        <div class="card-header">
            Form Edit Profile
        </div>
        <form action="/updateprofile" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <label for="" style="font-size: 12px">Nama Depan</label>
                        <input name="nama_depan" type="text" class="form-control form-control-sm" value="{{auth()->user()->nama_depan}}">
                    </div>
                    <div class="col">
                        <label for="" style="font-size: 12px">Nama Belakang</label>
                        <input name="nama_belakang" type="text" class="form-control form-control-sm" value="{{auth()->user()->nama_belakang}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="" style="font-size: 12px">Perusahaan</label>
                        <input type="text" class="form-control form-control-sm" value="Diva's Cow" disabled>
                    </div>
                    <div class="col">
                        <label for="" style="font-size: 12px">Job</label>
                        <input type="text" class="form-control form-control-sm" value="{{auth()->user()->role->nama}}" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="" style="font-size: 12px">Telepon</label>
                        <input name="telepon" type="text" class="form-control form-control-sm" value="{{auth()->user()->telepon}}" >
                    </div>
                    <div class="col">
                        <label for="" style="font-size: 12px">Email</label>
                        <input name="email" type="text" class="form-control form-control-sm" value="{{auth()->user()->email}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="width: max-content">
                        <label for="" style="font-size: 12px">Alamat</label>
                        <input name="alamat" type="text" class="form-control form-control-sm" value="{{auth()->user()->alamat}}">
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col" style="width: max-content">
                        <label for="">Tanda Tangan</label>
                        <div class="gambar-ttd">
                            <img src="{{ Storage::url(auth()->user()->foto_ttd) }}" id="previewImage" src="" alt="Preview Image" >
                        </div>
                    </div>
                </div>
                <input name="foto_ttd" type="file" id="myFile" class="button-file"  />
                <div class="row">
                    <button type="submit" class="button-simpan">Simpan</button>
                </div>
            </div>
        </form>
      </div>

    </div>

  </div>
</section>

<style>
    .text-center{
        display: flex;
        justify-content: center;
    }
    .gambar-ttd {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        overflow: hidden;
        justify-content: center;
        margin-left: 200px;
        border: 1px solid rgb(6, 41, 75);
    }

    .gambar-ttd img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .button-simpan{
        background: rgb(8, 149, 224);
        color: white;
        border-radius: 5px;
        margin-top: 5px;
        width:100px;
        border: 0px;
        margin-left: 500px
    }
    .button-file{
        width: 100px;
        margin-top:5px;
        margin-left: 15.5em;
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
    });
</script>
