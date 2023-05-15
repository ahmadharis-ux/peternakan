@extends('layouts.main')
@section('container')
    {{-- @dd($listSupplierSapi) --}}

    <section class="section dashboard">

        <!-- Recent Sales -->
        <div class="col-12">
            <div class="card recent-sales overflow-auto">

                <div class="card-body">
                    <h5 class="card-title">Data Hutang </h5>
                    <div class="container mb-3">

                        {{-- Hutang --}}
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#hutang">Hutang</button>
                        <!-- Modal -->
                        <div class="modal fade" id="hutang" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="/storekas" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Kas Hutang</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-sm-12">
                                                <label for="">Supplier Sapi</label>
                                                <input type="hidden" name="jurnal_id" value="{{ 1 }}" required>
                                                {{-- <input type="hidden" name="author" value="{{ auth()->user()->name }}" required> --}}
                                                <select name="user_id" id="" class="form-select">
                                                    @foreach ($listSupplierSapi as $supplier)
                                                        <option value="{{ $supplier->id }}">{{ $supplier->fullname }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-12">
                                                <label for="">Keterangan</label>
                                                <textarea required name="keterangan" class="form-control" placeholder="keterangan" id="" cols="30"
                                                    rows="10"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <table id="example" class="display " style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Pihak kedua</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Kredit</th>
                                {{-- <th scope="col">Saldo</th> --}}
                                <th scope="col">Jurnal</th>
                                <th scope="col">Detail</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>

            </div>
        </div><!-- End Recent Sales -->
    </section>
@endsection
