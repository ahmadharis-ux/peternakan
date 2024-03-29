@extends('layouts.main')
@section('container')
    <div class="alert alert-warning text-center">
        This page is still under construction
    </div>

    <section class="section dashboard">

        <!-- Recent Sales -->
        <div class="col-12">
            <div class="card recent-sales overflow-auto">

                <div class="card-body">
                    <h5 class="card-title">Kas</h5>
                    <div class="row">
                        <div class="col-sm">
                            {{-- btn pilih jenis transaksi --}}
                        </div>

                        {{-- table rekening --}}
                        <div class="col-sm">
                            @include('accounting.kas.tableInfoRekening')
                        </div>

                    </div>


                    <hr>

                    {{-- table list kas --}}
                    {{-- @include('accounting.kas.tableListKas') --}}
                    @include('accounting.kas.tableHistoriTransaksi')


                </div>

            </div>
        </div><!-- End Recent Sales -->
    </section>

    {{-- modals --}}
    @include('accounting.pembelian_sapi.modalCreate')
    @include('accounting.penjualan_sapi.modalCreate')

    {{-- @include('accounting.pembelian_pakan.modalCreate') --}}
    {{-- @include('accounting.pemakaian_pakan.modalCreate') --}}



    <div class="d-none container mb-3">

        {{-- Hutang --}}
        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
            data-bs-target="#modalCreatePembelianSapi">Hutang</button>

        {{-- Piutang --}}
        <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal"
            data-bs-target="#modalCreatePenjualanSapi">Piutang</button>

        {{-- pakan --}}
        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
            data-bs-target="#modalCreatePembelianPakan">Pakan</button>

        {{-- Gaji --}}
        {{-- <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                        data-bs-target="#gaji">Gaji</button>
                                    <div class="modal fade" id="gaji" data-bs-backdrop="static" data-bs-keyboard="false"
                                        tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="/storekas" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Kas Pakan</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-sm-12">
                                                            <label for="">Pekerja</label>
                                                            <input type="hidden" name="jurnal_id" value="{{ 4 }}"
                                                                required>
                                                            <input type="hidden" name="author"
                                                                value="{{ auth()->user()->name }}" required>
                                                            <select name="user_id" id="" class="form-select">
                                                                @foreach ($pekerja as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->name }}
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
                                    </div> --}}
    </div>
@endsection
