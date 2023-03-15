@extends('admin.layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Detail Data {{ $judul }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboardAdmin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ route('user') }}">Data {{ $judul }}</a></li>
            <li class="active">Detail Data {{ $judul }}</li>
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
                        <h3 class="box-title">List Detail Data {{ $judul }}</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">

                        @csrf

                        <div class="box-body">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Masukkan Nama" value="{{ old('nama') ? old('nama') : $users->nama }}"
                                    required disabled>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Masukkan Username"
                                    value="{{ old('username') ? old('username') : $users->username }}" required disabled>
                            </div>
                            <div class="form-group">
                                <label for="id_outlet">Nama Outlet</label>
                                <select class="form-control" id="id_outlet" name="id_outlet" required disabled>
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
                                <label for="role">Role</label>
                                <select class="form-control" id="role" name="role" required disabled>
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
                            {{-- <button type="submit" class="btn btn-success">Simpan</button> --}}
                        </div>
                    </form>
                </div><!-- /.box -->
            </div> <!-- /.row -->
    </section><!-- /.content -->
@endsection
