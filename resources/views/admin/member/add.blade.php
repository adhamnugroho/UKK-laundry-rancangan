@extends('admin.layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tambah Data {{ $judul }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboardAdmin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ route('member') }}">Data {{ $judul }}</a></li>
            <li class="active">Tambah Data {{ $judul }}</li>
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
                        <h3 class="box-title">Form Tambah Data {{ $judul }}</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('memberStore') }}">

                        @csrf

                        <div class="box-body">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap <sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Masukkan Nama" value="{{ old('nama') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="tlp">Nomor Telepon <sup class="text-danger">*</sup></label>
                                <input type="tel" class="form-control" id="tlp" name="tlp"
                                    placeholder="Masukkan Nomor Telepon" value="{{ old('tlp') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Lengkap <sup class="text-danger">*</sup></label>
                                <textarea class="form-control" rows="3" placeholder="Masukkan Alamat Lengkap" id="alamat" name="alamat"
                                    required>{{ old('alamat') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin <sup class="text-danger">*</sup></label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option> .:: Pilih Jenis Kelamin ::.</option>
                                    <option {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }} value="L">
                                        Laki - Laki
                                    </option>
                                    <option {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }} value="P">
                                        Perempuan
                                    </option>
                                </select>
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer text-right">
                            <a href="{{ route('member') }}" class="btn btn-warning mr-2">Kembali</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div> <!-- /.row -->
    </section><!-- /.content -->
@endsection
