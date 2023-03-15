@extends('admin.layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Data {{ $judul }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboardAdmin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ route('user') }}">Data {{ $judul }}</a></li>
            <li class="active">Edit Data {{ $judul }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="margin-top: 3%;">
        <div class="row" style="display: flex;justify-content:center;">
            <!-- left column -->
            <div class="col-md-10">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Form Edit Data {{ $judul }}</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('userUpdate') }}">

                        @csrf

                        <div class="box-body">
                            <input type="hidden" name="id" value="{{ $users->id }}">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap <sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Masukkan Nama" value="{{ old('nama') ? old('nama') : $users->nama }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username <sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Masukkan Username"
                                    value="{{ old('username') ? old('username') : $users->username }}" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Masukkan Password" value="{{ old('password') }}">
                            </div>
                            <div class="form-group">
                                <label for="id_outlet">Nama Outlet <sup class="text-danger">*</sup></label>
                                <select class="form-control" id="id_outlet" name="id_outlet" required>
                                    <option> .:: Pilih Outlet ::.</option>
                                    @foreach ($outlet as $ot)
                                        <option {{ $users->id_outlet == $ot->id ? 'selected' : '' }}
                                            value="{{ $ot->id }}">
                                            {{ $ot->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="role">Role <sup class="text-danger">*</sup></label>
                                <select class="form-control" id="role" name="role" required>
                                    <option> .:: Pilih Role ::.</option>
                                    <option {{ $users->role == 'admin' ? 'selected' : '' }} value="admin">
                                        Admin
                                    </option>
                                    <option {{ $users->role == 'kasir' ? 'selected' : '' }} value="kasir">
                                        Kasir
                                    </option>
                                    <option {{ $users->role == 'owner' ? 'selected' : '' }} value="owner">
                                        Owner
                                    </option>
                                </select>
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer text-right">
                            <a href="{{ route('user') }}" class="btn btn-warning mr-2">Kembali</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div> <!-- /.row -->
    </section><!-- /.content -->
@endsection
