@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <div class="row my-2">

                    <div class="col-sm-3">Jurnal : </div>
                    <div class="col-sm-9">{{ $data->jurnal->name }}</div>
                    @if ($data->jurnal->name == 'Piutang')
                        <div class="col-sm-3">Total Harga : </div>
                        <div class="col-sm-9">Rp. {{ number_format($data->bobot * $data->harga) }} </div>
                        <div class="col-sm-3">Telah Dibayar : </div>
                        <div class="col-sm-9">Rp. {{ number_format($data->pembayaran->sum('debits')) }} </div>
                        <div class="col-sm-3">Sisa Pembayaran : </div>
                        <div class="col-sm-9">Rp.
                            {{ number_format($data->bobot * $data->harga - $data->pembayaran->sum('debits')) }} </div>
                        <div class="col-sm-3">Status : </div>
                        <div class="col-sm-9">
                            @if (
                                $data->bobot * $data->harga == $data->pembayaran->sum('debits') ||
                                    $data->bobot * $data->harga == $data->pembayaran->sum('kredits'))
                                Lunas
                            @else
                                Belum Lunas
                            @endif
                        </div>
                    @elseif($data->jurnal->name == 'Hutang')
                        <div class="col-sm-3">Total Harga : </div>
                        <div class="col-sm-9">Rp. {{ number_format($data->bobot * $data->harga) }} </div>
                        <div class="col-sm-3">Telah Dibayar : </div>
                        <div class="col-sm-9">Rp. {{ number_format($data->pembayaran->sum('kredits')) }} </div>
                        <div class="col-sm-3">Sisa Pembayaran : </div>
                        <div class="col-sm-9">Rp.
                            {{ number_format($data->bobot * $data->harga - $data->pembayaran->sum('kredits')) }} </div>
                        <div class="col-sm-3">Status : </div>
                        <div class="col-sm-9">
                            @if (
                                $data->bobot * $data->harga == $data->pembayaran->sum('debits') ||
                                    $data->bobot * $data->harga == $data->pembayaran->sum('kredits'))
                                Lunas
                            @else
                                Belum Lunas
                            @endif
                        </div>
                    @elseif($data->jurnal->name == 'Pakan')
                        <div class="col-sm-3">Harga Satuan : </div>
                        <div class="col-sm-9">Rp. {{ number_format($data->harga) }} / {{ $data->satuan }} </div>
                        <div class="col-sm-3">Quantity : </div>
                        <div class="col-sm-9">{{ $data->qty }} {{ $data->satuan }} </div>
                        <div class="col-sm-5">
                            <hr>
                        </div>
                        <div class="col-sm-7"></div>
                        <div class="col-sm-3">Total Harga : </div>
                        <div class="col-sm-9">Rp. {{ number_format($data->qty * $data->harga) }} </div>
                        <div class="col-sm-3">Telah Dibayar : </div>
                        <div class="col-sm-9">Rp. {{ number_format($data->pembayaran->sum('kredits')) }} </div>
                        <div class="col-sm-3">Sisa Pembayaran : </div>
                        <div class="col-sm-9">Rp.
                            {{ number_format($data->qty * $data->harga - $data->pembayaran->sum('kredits')) }} </div>
                        <div class="col-sm-5">
                            <hr>
                        </div>
                        <div class="col-sm-7"></div>
                        <div class="col-sm-3">Status : </div>
                        <div class="col-sm-9">
                            @if (
                                $data->qty * $data->harga == $data->pembayaran->sum('debits') ||
                                    $data->qty * $data->harga == $data->pembayaran->sum('kredits'))
                                Lunas
                            @else
                                Belum Lunas
                            @endif
                        </div>
                    @endif

                    <div class="col-sm-9">
                        <a href="/export-pdf/pembayaran/{{ $data->id }}"
                            class="btn btn-md btn-success mt-3 ">Export</a><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2 ms-auto mt-2">
                        <h6><span class="badge bg-success">{{ date('d - F - Y', strtotime($date)) }}</span></h6>
                    </div>
                </div>
                @if ($data->jurnal->name == 'Piutang')
                    <form action="/create/pembayaran" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm mt-3">
                                <label for="">Debit</label>
                                <input type="number" name="debit" class="form-control">
                                <input type="hidden" value="{{ $data->id }}" name="kas_id" id="">
                                <input type="hidden" value="{{ auth()->user()->name }}" name="author" id="">
                            </div>
                            <div class="col-sm mt-3">
                                <label for="">Keterangan</label>
                                <input type="text" name="keterangan" class="form-control">
                            </div>
                            <div class="col-sm mt-3">
                                <label for="">Penerimaan</label>
                                <select type="text" name="rekening_id" class="form-select">
                                    @foreach ($rekening as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }} {{ $item->norek }}
                                            {{ $item->bank }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-sm-1 ms-auto">
                                    <button type="submit" class="btn btn-md btn-primary mt-3">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                @else
                    <form action="/create/pembayaran" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm mt-3">
                                <label for="">Kredit</label>
                                <input type="number" name="kredit" class="form-control">
                                <input type="hidden" value="{{ $data->id }}" name="kas_id" id="">
                                <input type="hidden" value="{{ auth()->user()->name }}" name="author" id="">
                            </div>
                            <div class="col-sm mt-3">
                                <label for="">Keterangan</label>
                                <input type="text" name="ket" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-sm-1 ms-auto">
                                    <button type="submit" class="btn btn-md btn-primary mt-3">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                @endif

                <hr>
                <table class="table" id="example">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            @if ($data->jurnal->name == 'Piutang')
                                <th>Debit</th>
                                <th>Rekening</th>
                            @else
                                <th>Kredit</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembayaran as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('d - F - Y', strtotime($item->tanggal)) }}</td>
                                <td>{{ $item->ket }}</td>
                                @if ($item->kas->jurnal->name == 'Piutang')
                                    <td>Rp. {{ number_format($item->debit) }}</td>
                                    <td>{{ $item->rekening->name }} {{ $item->rekening->norek }}
                                        {{ $item->rekening->bank }}</td>
                                @else
                                    <td>Rp. {{ number_format($item->kredit) }}</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </section>
@endsection
