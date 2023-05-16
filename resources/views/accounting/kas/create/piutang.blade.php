@extends('layouts.main')
@section('container')
<section class="section dashboard">
    <div class="card">
        <h5 class="card-title mx-3">Form Piutang</h5>
        <div class="card-body">
            <form  method="POST" action="/store/hutang">
                @csrf
                <div class="my-2">
                    <div class="row mb-3">
                        <div class="col-sm">
                            <label for="">Eartag</label>
                            <input type="text" id="eartag" name="eartag[]"  class="form-control">
                            <input type="hidden" id="jurnal_id" name="jurnal_id[]" value="{{$jurnal->id}}"  class="form-control">
                        </div>
                        <div class="col-sm">
                            <label for="">Bobot</label>
                            <input type="number"id="bobot" name="bobot[]"  class="form-control">
                        </div>
                        <div class="col-sm">
                            <label for="">Harga</label>
                            <input type="number"id="harga" name="harga[]"  class="form-control">
                        </div>
                        <div class="col-sm">
                            <label for="">Kondisi</label>
                            <input type="text" id="kondisi" name="kondisi[]"  class="form-control">
                        </div>
                        <div class="col-sm-12 mt-2">
                            <label for="">Keterangan</label>
                            <input type="text" id="keterangan" name="keterangan[]" class="form-control">
                        </div>
                        <div class="col-sm-3 mt-2">
                            <label for="">Supplier</label>
                            <select id="user_id" name="user_id[]" class="form-select">
                                @foreach ($supplier as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3 mt-2">
                            <input type="hidden" class="form-control text-primary" style="border: none" id="author" name="author[]" value="{{auth()->user()->name}}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-3">
                            <label for="">Debit</label>
                            <input type="number" name="debit[]" id="" class="form-control">
                        </div>
                        <div class="col-sm-3">
                            <label for="">Rekening</label>
                            <select type="text" name="rekening_id[]" id="" class="form-control">
                                @foreach ($rek as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="">Kredit</label>
                            <input type="number" name="kredit[]" id="" class="form-control">
                        </div>
                        <div class="col-sm-9">
                            <label for="">Keterangan</label>
                            <input type="text" name="ket[]" id="" class="form-control">
                            <input type="hidden" value="{{auth()->user()->name}}" name="author[]" id="" class="form-control">
                        </div>
                       
                    </div>
                    <hr>
                </div>
                <div class="hutang mt-3"></div>
                <div class="row">
                    <div class="col-sm-3 mt-4">
                        <a href="#" class="addhutang btn btn-info">Tambah Form</a>
                    </div>
                    <div class="col-sm-3 mt-4">
                        <button type="submit" class="btn btn-success">Simpan Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
  <script type="text/javascript">
      $('.addhutang').on('click', function(){
          addhutang();
      });
      function addhutang(){
          var hutang = '<div><div class="row mb-3"> <div class="col-sm"> <label for="">Eartag</label><input type="text" id="eartag" name="eartag[]"  class="form-control"><input type="hidden" id="jurnal_id" name="jurnal_id[]" value="{{$jurnal->id}}"  class="form-control"> </div> <div class="col-sm"><label for="">Bobot</label> <input type="number"id="bobot" name="bobot[]"  class="form-control">  </div><div class="col-sm">  <label for="">Harga</label><input type="number"id="harga" name="harga[]"  class="form-control"> </div><div class="col-sm"><label for="">Kondisi</label><input type="text" id="kondisi" name="kondisi[]"  class="form-control"></div><div class="col-sm-12 mt-2"><label for="">Keterangan</label> <input type="text" id="keterangan" name="keterangan[]" class="form-control"> </div> <div class="col-sm-3 mt-2"> <label for="">Supplier</label><select id="user_id" name="user_id[]" class="form-select"> @foreach ($supplier as $item)<option value="{{$item->id}}">{{$item->name}}</option> @endforeach </select> </div> <div class="col-sm-3 mt-2">  <input type="hidden" class="form-control text-primary" style="border: none" id="author" name="author[]" value="{{auth()->user()->name}}"> </div></div><div class="row mt-3"><div class="col-sm-3"> <label for="">Debit</label><input type="number" name="debit[]" id="" class="form-control"></div> <div class="col-sm-3"> <label for="">Rekening</label> <select type="text" name="rekening_id[]" id="" class="form-control"> @foreach ($rek as $item)<option value="{{$item->id}}">{{$item->name}}</option> @endforeach</select> </div> <div class="col-sm-3"><label for="">Kredit</label> <input type="number" name="kredit[]" id="" class="form-control"></div><div class="col-sm-9"><label for="">Keterangan</label> <input type="text" name="ket[]" id="" class="form-control"><input type="hidden" value="{{auth()->user()->name}}" name="author[]" id="" class="form-control"></div> </div><div class="col-sm-3 mt-3"><a href="#" class="remove btn btn-sm btn-danger">Hapus form</a></div><hr></div>';
          $('.hutang').append(hutang);
      };
      $('.remove').live('click', function(){
          $(this).parent().parent().remove();
      });
  
  </script>
@endsection
 