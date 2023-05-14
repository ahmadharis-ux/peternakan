@extends('layouts.main')
@section('container')
<section class="section dashboard">
    <div class="card">
        <div class="card-body">
            <div class="row my-2">
                <div class="col-sm-3">Nama : </div>
                <div class="col-sm-9">{{$data->keterangan}}</div>
                <div class="col-sm-3">Stok : </div>
                <div class="col-sm-9">{{$data->qty - $data->pakan->sum('qty')}} {{$data->satuan}} </div>
                <div class="col-sm-3">Harga Beli : </div>
                <div class="col-sm-9">{{$data->harga}} / {{$data->satuan}}</div>
                <div class="col-sm-3">Tanggal Pembelian : </div>
                <div class="col-sm-9">{{date("d - F - Y", strtotime($data->tanggal))}}</div>  
            </div>
            <hr>
            <h6>Form Pemakaian : <span class="badge bg-success">{{date("d - F - Y",strtotime($date))}}</span></h6>
            <form action="/create/pakan" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm mt-3">
                        <label for="">Quantity</label>
                        <input type="number" name="qty" class="form-control">
                        <input type="hidden" value="{{$data->id}}" name="kas_id" id="">
                    </div>
                    <div class="col-sm mt-3">
                        <label for="">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control">
                    </div>
                    <div class="col-sm mt-3">
                        <label for="">Author</label>
                        <input type="text" name="author" value="{{auth()->user()->name}}" readonly class="form-control">
                    </div>
                    <div class="row">    
                        <div class="col-sm-1 ms-auto">
                            <button class="btn btn-md btn-primary mt-3">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <table class="table" id="example">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data->pakan as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{date("d - F - Y", strtotime($data->tanggal))}}</td>
                        <td>{{$item->keterangan}}</td>
                        <td>{{$item->qty}} {{$item->kas->satuan}}</td>
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
    </div>
</section>
@endsection