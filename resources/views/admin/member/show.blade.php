@extends('admin.layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Detail Data {{ $judul }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboardAdmin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ route('member') }}">Data Member</a></li>
            <li class="active">Detail Data</li>
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
                        <h3 class="box-title">List Data Lengkap {{ $judul }}</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Masukkan Email"
                                    value="{{ old('nama') ? old('nama') : $member->nama }}"
                                    disabled required>
                            </div>
                            <div class="form-group">
                                <label for="tlp">Nomor Telepon</label>
                                <input type="tlp" class="form-control" id="tlp" name="tlp"
                                    placeholder="Masukkan Nomor Telepon"
                                    value="{{ old('tlp') ? old('tlp') : $member->tlp }}" disabled required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Lengkap</label>
                                <textarea class="form-control" rows="3" placeholder="Masukkan Alamat Lengkap" id="alamat"
                                    name="alamat" disabled required>{{ old('alamat') ? old('alamat') : $member->alamat }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required disabled>
                                    <option> .:: Pilih Jenis Kelamin ::.</option>
                                    <option {{ $member->jenis_kelamin == 'L' ? 'selected' : '' }} value="L">
                                        Laki - Laki
                                    </option>
                                    <option {{ $member->jenis_kelamin == 'P' ? 'selected' : '' }} value="P">
                                        Perempuan
                                    </option>
                                </select>
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer text-right">
                            <a href="{{ route('member') }}" class="btn btn-warning">Kembali</a>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div> <!-- /.row -->
    </section><!-- /.content -->
@endsection
