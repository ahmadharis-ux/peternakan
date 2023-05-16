@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Produk <button class="btn btn-sm btn-primary mx-3" data-bs-toggle="modal"
                                data-bs-target="#produk">Tambah</button></h5>
                        <!-- Modal -->
                        <div class="modal fade" id="produk" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="/storesapi" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal Produk</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <input type="hidden" name="kas_id" value="{{ $data->id }}"
                                                    class="form-control">
                                                <div class="col-sm-4 mb-3">
                                                    <label for="">Eartag</label>
                                                    <input type="text" name="eartag" value="" class="form-control"
                                                        required>
                                                </div>
                                                <div class="col-sm-4 mb-3">
                                                    <label for="">Bobot</label>
                                                    <input type="number" name="bobot" value="" class="form-control"
                                                        required>
                                                </div>
                                                <div class="col-sm-4 mb-3">
                                                    <label for="">Harga / Kg</label>
                                                    <input type="number" name="harga_kg" value=""
                                                        class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <label for="">Total Harga</label>
                                                <input type="number" name="total_harga" value="" class="form-control"
                                                    required>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <label for="">Keterangan</label>
                                                <textarea name="keterangan" class="form-control" id="" cols="30" rows="10" required></textarea>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <label for="">Kondisi</label>
                                                <input type="text" value="" name="kondisi" class="form-control"
                                                    required>
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
                    <div class="card-body">
                        <div class="section">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Eartag</th>
                                        <th scope="col">Bobot</th>
                                        <th scope="col">Kondisi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data->hutang as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                            <td>{{ $item->eartag }}</td>
                                            <td>{{ $item->bobot }}</td>
                                            <td>{{ $item->kondisi }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th colspan="4">Subtotal</th>
                                        <td>Rp. {{ number_format($data->hutang->sum('total_harga')) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Opresional</h5>
                    </div>
                    <div class="card-body">
                        <form action="/storeopr" method="post">
                            @csrf
                            <div class="row mt-2">
                                <div class="col-sm-5 mb-3">
                                    <label for="">Keterangan</label>
                                    <input type="text" class="form-control" name="keterangan">
                                    <input type="hidden" class="form-control" value="{{ $data->id }}" name="kas_id">
                                </div>
                                <div class="col-sm-5 mb-3">
                                    <label for="">Nominal Operasional</label>
                                    <input type="number" class="form-control" name="nominal">
                                </div>
                                <div class="col-sm-2 mb-3">
                                    <br>
                                    <button type="submit" class="btn btn-sm btn-primary">+</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="section">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Nominal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data->operasional as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                            <td>{{ $item->keterangan }}</td>
                                            <td>Rp. {{ number_format($item->nominal) }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th colspan="3">Subtotal</th>
                                        <td>Rp. {{ number_format($data->operasional->sum('nominal')) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5>Riwayat Pembayaran<button class="btn btn-sm btn-primary mx-3" data-bs-toggle="modal"
                                data-bs-target="#pembayaran">Tambah</button></h5>
                        <!-- Modal -->
                        <div class="modal fade" id="pembayaran" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="/storetrans" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal Pembayaran</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row mt-2">
                                                <div class="col-sm-12 mb-3">
                                                    <label for="">Keterangan</label>
                                                    <input type="text" class="form-control" name="ket" required>
                                                    <input type="hidden" class="form-control"
                                                        value="{{ $data->id }}" name="kas_id">
                                                    <input type="hidden" class="form-control"
                                                        value="{{ auth()->user()->name }}" name="author">
                                                </div>
                                                <div class="col-sm-12 mb-3">
                                                    <label for="">Kredit</label>
                                                    <input type="number" class="form-control" name="kredit" required>
                                                </div>
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
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="section">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Kredit</th>
                                                <th scope="col">Nominal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data->pembayaran as $item)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                                    <td>{{ $item->ket }}</td>
                                                    <td>Rp. {{ number_format($item->kredit) }}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <th colspan="3">Subtotal</th>
                                                <td>Rp. {{ number_format($data->pembayaran->sum('kredits')) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="row mt-3">
                                    <div class="col-sm">Total : </div>
                                    <div class="col-sm justify-content-end">
                                        Rp,
                                        {{ number_format($data->hutang->sum('total_harga') + $data->operasional->sum('nominal')) }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm">Tunai : </div>
                                    <div class="col-sm justify-content-end">
                                        Rp. {{ number_format($data->pembayaran->sum('kredits')) }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm">Sisa Pembayaran : </div>
                                    <div class="col-sm justify-content-end">
                                        Rp.
                                        {{ number_format($data->hutang->sum('total_harga') + $data->operasional->sum('nominal') - $data->pembayaran->sum('kredits')) }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm">Status : </div>
                                    <div class="col-sm justify-content-end">
                                        @if ($data->pembayaran->sum('kredits') == $data->hutang->sum('total_harga') + $data->operasional->sum('nominal'))
                                            Lunas
                                        @elseif($data->pembayaran->sum('kredits') < $data->hutang->sum('total_harga') + $data->operasional->sum('nominal'))
                                            Belum Lunas
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
