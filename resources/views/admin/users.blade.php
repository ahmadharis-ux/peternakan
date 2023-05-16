@extends('layouts.main')
@section('container')
<section class="section dashboard">
    <div class="card">
        <div class="card-body  my-4 mx-4">
            @if (session()->has('success'))
                <div class="alert alert-success col-lg-10" role="alert">
                {{session('success')}}
                </div>
            @elseif(session()->has('error'))
                <div class="alert alert-danger col-lg-10" role="alert">
                {{session('error')}}
                </div>
            @endif
            <table id="example" class="display " style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Position</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->name}}</td>
                        <td>
                            <div class="row">
                                <div class="col-sm">
                                    <a href="">
                                        <div class="icon">
                                        <i class="bi bi-eye-fill"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm">
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$user->id}}" >
                                        <div class="icon">
                                            <i class="bi bi-pencil-square"></i>
                                        </div>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form action="/editrole/{{$user->id}}" method="post" enctype="multipart/form-data">
                                                @method('PUT')
                                                @csrf   
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Hak Akses</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <span>Name : {{$user->name}}</span>
                                                    <div class="col-sm my-2">
                                                        <label for="">Hak Akses</label>
                                                        <select class="form-select" name="role_id" >
                                                            @foreach ($roles as $role)
                                                            @if (old('role_id', $user->role_id) == $role->id)
                                                                <option value="{{$role->id}}" selected>{{$role->name}}</option>
                                                            @else
                                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
  