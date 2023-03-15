@extends('admin.layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Data {{ $judul }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboardAdmin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ route('paket') }}">Data {{ $judul }}</a></li>
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
                    <form role="form" method="POST" action="{{ route('paketUpdate') }}">

                        @csrf

                        <div class="box-body">
                            <input type="hidden" name="id" value="{{ $paket->id }}">
                            <div class="form-group">
                                <label for="nama">Nama Paket <sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Masukkan Nama Paket" value="{{ old('nama') ? old('nama') : $paket->nama }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="jenis">Jenis Paket <sup class="text-danger">*</sup></label>
                                <select class="form-control" id="jenis" name="jenis" required>
                                    <option> .:: Pilih Jenis Paket ::.</option>
                                    <option {{ $paket->jenis == 'kiloan' ? 'selected' : '' }} value="kiloan">
                                        Kiloan
                                    </option>
                                    <option {{ $paket->jenis == 'bed_cover' ? 'selected' : '' }} value="bed_cover">
                                        Bed Cover
                                    </option>
                                    <option {{ $paket->jenis == 'selimut' ? 'selected' : '' }} value="selimut">
                                        Selimut
                                    </option>
                                    <option {{ $paket->jenis == 'kaos' ? 'selected' : '' }} value="kaos">
                                        Kaos
                                    </option>
                                    <option {{ $paket->jenis == 'lain' ? 'selected' : '' }} value="lain">
                                        Lain
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_outlet">Outlet <sup class="text-danger">*</sup></label>
                                <select class="form-control" id="id_outlet" name="id_outlet" required>
                                    <option> .:: Pilih Outlet ::.</option>
                                    @foreach ($outlet as $ot)
                                        <option {{ $paket->id_outlet == $ot->id ? 'selected' : '' }}
                                            value="{{ $ot->id }}">
                                            {{ $ot->nama }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga Paket <sup class="text-danger">*</sup></label>
                                <input type="number" class="form-control" id="harga" name="harga"
                                    placeholder="Masukkan Harga Paket"
                                    value="{{ old('harga') ? old('harga') : $paket->harga }}" min="20000" required>
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer text-right">
                            <a href="{{ route('paket') }}" class="btn btn-warning mr-2">Kembali</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div> <!-- /.row -->
    </section><!-- /.content -->
@endsection
