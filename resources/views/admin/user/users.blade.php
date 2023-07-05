@extends('layouts.main')
@section('container')
    {{-- alerts --}}
    <div class="d-block">
        @if (session()->has('success'))
            <div class="alert alert-success col" role="alert">
                {{ session('success') }}
            </div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger col" role="alert">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <section class="section dashboard">
        {{-- card filter --}}
        <div class="card recent-sales overflow-auto">
            <div class="card-body">
                <h5 class="card-title">Filter</h5>
                @include('admin.user.formFilter')

            </div>
        </div>

        <div class="card">
            <div class="card-body my-4 mx-4">

                {{-- table list user --}}
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->fullname() }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role->nama }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-sm">
                                            <a href="" class="btn btn-sm btn-primary">
                                                <div class="icon">
                                                    <i class="bi bi-eye-fill"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-sm">
                                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop{{ $user->id }}">
                                                <div class="icon">
                                                    <i class="bi bi-pencil-square"></i>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>


                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop{{ $user->id }}" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <form action="/admin/users/editrole/{{ $user->id }}" method="post"
                                            enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf

                                            <input type="hidden" name="id_user" value="{{ $user->id }}">

                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit
                                                    Hak Akses</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <span>Name : {{ $user->fullname() }}</span>
                                                <div class="col-sm my-2">
                                                    <label for="">Hak Akses</label>
                                                    <select class="form-select" name="id_role">
                                                        @foreach ($roles as $role)
                                                            @if (old('id_role', $user->id_role) == $role->id)
                                                                <option value="{{ $role->id }}" selected>
                                                                    {{ $role->nama }}</option>
                                                            @else
                                                                <option value="{{ $role->id }}">
                                                                    {{ $role->nama }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Simpan
                                                    Perubahan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
