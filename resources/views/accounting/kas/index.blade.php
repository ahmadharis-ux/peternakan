@extends('layouts.main')
@section('container')
    <section class="section dashboard">

        <!-- Recent Sales -->
        <div class="col-12">
            <div class="card recent-sales overflow-auto">

                <div class="card-body">
                    <h5 class="card-title">Data Buku Kas Besar</h5>
                    <div class="row">
                        <div class="col-sm">
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
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Kas
                                                        {{ $hutang->name }}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-sm-12">
                                                        <label for="">Supplier Sapi</label>
                                                        <input type="hidden" name="jurnal_id" value="{{ $hutang->id }}"
                                                            required>
                                                        <input type="hidden" name="author"
                                                            value="{{ auth()->user()->name }}" required>
                                                        <select name="user_id" id="" class="form-select">
                                                            @foreach ($supsapi as $supplier)
                                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}
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
                                {{-- Piutang --}}
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#piutang">Piutang</button>
                                <!-- Modal -->
                                <div class="modal fade" id="piutang" data-bs-backdrop="static" data-bs-keyboard="false"
                                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form action="/storekas" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Kas Piutang</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-sm-12">
                                                        <label for="">Customer</label>
                                                        <input type="hidden" name="jurnal_id" value="{{ 2 }}"
                                                            required>
                                                        <input type="hidden" name="author"
                                                            value="{{ auth()->user()->name }}" required>
                                                        <select name="user_id" id="" class="form-select">
                                                            @foreach ($cust as $customer)
                                                                <option value="{{ $customer->id }}">{{ $customer->name }}
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
                                {{-- pakan --}}
                                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                    data-bs-target="#pakan">Pakan</button>
                                <div class="modal fade" id="pakan" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1">
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
                                                        <label for="">Supplier Pakan</label>
                                                        <input type="hidden" name="jurnal_id"
                                                            value="{{ 3 }}" required>
                                                        <input type="hidden" name="author"
                                                            value="{{ auth()->user()->name }}" required>
                                                        <select name="user_id" id="" class="form-select">
                                                            @foreach ($suppakan as $pakan)
                                                                <option value="{{ $pakan->id }}">{{ $pakan->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <select name="pakan_id" id="" class="form-select">
                                                            @foreach ($datapakan as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }} -
                                                                    {{ $item->user->name }}</option>
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
                                {{-- Gaji --}}
                                <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                    data-bs-target="#gaji">Gaji</button>
                                <div class="modal fade" id="gaji" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1">
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
                                                        <input type="hidden" name="jurnal_id"
                                                            value="{{ 4 }}" required>
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
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Rekening</th>
                                        <th>Saldo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rekening as $item)
                                        <tr>
                                            <td>{{ $item->name }} {{ $item->norek }} {{ $item->bank }}</td>
                                            <td>Rp. {{ number_format($item->pembayaran->sum('debits')) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <hr>

                    <table id="example" class="display " style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Debit</th>
                                <th scope="col">Kredit</th>
                                <th scope="col">Saldo</th>
                                <th scope="col">Jurnal</th>
                                <th scope="col">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kas as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ date('d/m/Y', strtotime($item->tanggal)) }}</td>
                                    <td><a href="#" class="text-primary">{{ $item->user->name }}</a></td>
                                    <td>{{ $item->keterangan }}</td>
                                    <td>Rp. {{ number_format($item->pembayaran->sum('debits')) }}</td>
                                    <td>Rp. {{ number_format($item->pembayaran->sum('kredits')) }}</td>
                                    <td>Rp. </td>
                                    <td><a href="#" class="text-primary">{{ $item->jurnal->name }}</a></td>
                                    <td><a href="/detail/kas/{{ $item->jurnal->id }}/{{ $item->id }}"
                                            class="btn btn-sm text-primary">Lihat</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div><!-- End Recent Sales -->
    </section>
@endsection
