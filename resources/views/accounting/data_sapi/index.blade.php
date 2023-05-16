@extends('layouts.main')
@section('container')
<section class="section dashboard">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm">
                    <div class="card mt-3">
                        <div class="card-header">
                            Data Sapi Dikandang
                        </div>
                        <div class="card-body">
                            <div class="section my-3">
                                <table id="example" class="display" >
                                    <thead>
                                        <tr>
                                            <th>Eartag</th>
                                            <th>Harga Beli</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($hutang as $item)
                                        <tr>
                                            <th>{{$item->eartag}}</th>
                                            <td>{{$item->total_harga}}</td>
                                            <td><a href="" data-bs-toggle="modal" data-bs-target="#status{{$item->id}}">{{$item->status}}</a></td>
                                            <!-- Modal -->
                                            <div class="modal fade" id="status{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal Update Status</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="/editstatus/{{$item->id}}" method="post">
                                                        @method('PUT')
                                                        @csrf
                                                        <div class="modal-body">
                                                            <label for="" class="">Status Awal</label>
                                                            <input type="text" class="form-control" value="{{$item->status}}" readonly>
                                                            <label for="" class="mt-2">Status Baru</label>
                                                            <select name="status" id="" class="form-select">
                                                                @foreach ($status as $value => $label)
                                                                <option value="{{$value}}" >{{$label}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card mt-3">
                        <div class="card-header">
                            Data Sapi Terjual
                        </div>
                        <div class="card-body">
                            <div class="section my-3">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Eartag</th>
                                            <th>Bobot</th>
                                            <th>Harga Jual</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($piutang as $item)
                                        <tr>
                                            <th>{{$item->hutang->eartag}}</th>
                                            <td>{{$item->bobot}}</td>
                                            <td>{{$item->total_harga}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection