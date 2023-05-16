@extends('layouts.main')
@section('container')
    <section class="section dashboard">
        <div class="card">
            <h5 class="text-center mt-2">Penggajian Bulan {{ date('F', strtotime($data->created_at)) }} Tahun
                {{ date('Y', strtotime($data->created_at)) }}</h5>
            <h6 class="text-center">{{ $data->user->name }}</h6>
            <hr>

            @if ($salary == null)
                <div class="col-md-6 mx-3">
                    <form action="/inputsalary" method="post">
                        @csrf
                        Nominal Gaji
                        <input type="number" name="salary">
                        <input type="hidden" value="{{ $data->id }}" name="kas_id">
                        <input type="hidden" value="{{ auth()->user()->name }}" name="author">
                        <button type="submit" class="btn btn-sm btn-dark">Simpan</button>
                    </form>
                </div>
                <div class="col-sm text-center mx-3 my-3">
                    <h5><b>Isikan Salary Terlebih Dulu!!</b></h5>
                </div>
            @elseif($salary != null)
                <div class="col-md-6 mx-3">
                    <h5>Nominal Gaji Rp. {{ number_format($data->salary->sum('salary')) }}</h5>
                </div>
                <div class="row">
                    <div class="col-sm my-2 mx-2">
                        <div class="card-header" style="border-color: blue">
                            {{-- Gaji --}}
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#bayar">Bayar Gaji</button>
                            <!-- Modal -->
                            <div class="modal fade" id="bayar" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <form action="/storetrans" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Bayar Gaji Pegawai
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <label for="" class="mb-2">Sisa Gaji Yang Belum dibayar Rp.
                                                    {{ number_format($data->salary->sum('salary') - ($data->pembayaran->sum('kredits') + $data->kasbon->sum('nominal'))) }}</label>
                                                <div class="col-sm-12">
                                                    <label for="">Nominal</label>
                                                    <input type="number" class="form-control" name="kredit">
                                                    <input type="hidden" class="form-control" name="kas_id"
                                                        value="{{ $data->id }}">
                                                    <input type="hidden" name="author" class="form-control"
                                                        value="{{ auth()->user()->name }}">
                                                </div>
                                                <div class="col-sm-12">
                                                    <label for="">Keterangan</label>
                                                    <input type="text" class="form-control" name="ket">
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Nominal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data->pembayaran as $item)
                                        <tr>
                                            <th>{{ date('d/m/  Y', strtotime($item->created_at)) }}</th>
                                            <td>Rp. {{ number_format($item->kredit) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm my-2 mx-2">
                        <div class="card-header" style="border-color: green">
                            {{-- Kasbon --}}
                            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                data-bs-target="#kasbon">Kasih Kasbon</button>
                            <!-- Modal -->
                            <div class="modal fade" id="kasbon" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <form action="/kasihkasbon" method="post">
                                            @csrf
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Kasih Kasbon</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-sm-12">
                                                    <label for="">Keterangan</label>
                                                    <input type="text" class="form-control" name="keterangan">
                                                    <input type="hidden" value="{{ auth()->user()->name }}"
                                                        name="author">
                                                    <input type="hidden" value="{{ $data->id }}" name="kas_id">
                                                    <input type="hidden" value="{{ $data->user->id }}" name="user_id">
                                                </div>
                                                <div class="col-sm-12">
                                                    <label for="">Nominal</label>
                                                    <input type="number" class="form-control" name="nominal">
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Nominal</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data->kasbon as $item)
                                        <tr>
                                            <th>{{ date('d-m-Y', strtotime($item->created_at)) }}</th>
                                            <td>Rp. {{ number_format($item->nominal) }}</td>
                                            <td>{{ $item->keterangan }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
