@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        <div class="card">
            <div class="card-header">
                Supplier Pakan : {{ $data->user->name }} {{ $data->pakan_id }}
            </div>
            <div class="card-body">
                <div class="section">
                    <button class="btn btn-primary btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#pakan">Beli
                        Pakan</button>
                    <!-- Modal -->
                    <div class="modal fade" id="pakan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="/belipakan" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal Pembayaran</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row mt-2">
                                            <div class="col-sm-6 mb-3">
                                                <label for="">Supplier Pakan</label>
                                                <select name="pakan_id" id="" class="form-select">
                                                    @foreach ($pakan as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }} -
                                                            {{ $item->user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <div class="col-sm-12 mb-3">
                                                    <label for="">Quantity</label>
                                                    <input type="number" class="form-control" name="qty" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <label for="">Harga Satuan</label>
                                                <input type="number" class="form-control" name="harga_satuan" required>
                                                <input type="hidden" value="{{ auth()->user()->name }}"
                                                    class="form-control" name="author" required>
                                                <input type="hidden" value="{{ $data->id }}" class="form-control"
                                                    name="kas_id" required>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <label for="">Harga Total</label>
                                                <input type="number" class="form-control" name="harga_total" required>
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
                <div class="section">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Pakan</th>
                                <th>Qty</th>
                                <th>Satuan</th>
                                <th>Harga Satuan</th>
                                <th>Harga Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->belipakan as $item)
                                <tr>
                                    <td>{{ $item->pakan->name }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ $item->pakan->satuan }}</td>
                                    <td>{{ $item->harga_satuan }}</td>
                                    <td>{{ $item->harga_total }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Riwayat Pembayaran</div>
            <div class="card-body">
                <div class="section my-3 mx-3">
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#pembayaran">Bayar</button>
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
                                                <input type="hidden" class="form-control" value="{{ $data->id }}"
                                                    name="kas_id">
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
                <div class="row">
                    <div class="col-sm-8">
                        @foreach ($data->pembayaran as $item)
                            <div class="row">
                                <div class="col-sm">
                                    {{ date('d/m/Y', strtotime($item->created_at)) }}
                                </div>
                                <div class="col-sm">
                                    {{ $item->ket }}
                                </div>
                                <div class="col-sm justify-content-end">
                                    {{ $item->kredit }}
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                    <div class="col-sm-4">
                        <div class="row mt-3">
                            <div class="col-sm">Total : </div>
                            <div class="col-sm justify-content-end">
                                Rp. {{ number_format($data->belipakan->sum('harga_total')) }}
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
                                {{ number_format($data->belipakan->sum('harga_total') - $data->pembayaran->sum('kredits')) }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm">Status : </div>
                            <div class="col-sm justify-content-end">
                                @if ($data->pembayaran->sum('kredits') == $data->belipakan->sum('harga_total'))
                                    Lunas
                                @elseif($data->pembayaran->sum('kredits') < $data->belipakan->sum('harga_total'))
                                    Belum Lunas
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
