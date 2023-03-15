@extends('admin.layout.app')


@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tambah Data {{ $judul }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboardAdmin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ route('transaksi') }}">Data {{ $judul }}</a></li>
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
                    <form role="form" method="POST" action="{{ route('transaksiStore') }}">

                        @csrf

                        <div class="box-body">
                            <div class="form-group">
                                <label for="id_member">Nama Member <sup class="text-danger">*</sup></label>
                                <select class="form-control" id="id_member" name="id_member" required>
                                    <option> .:: Pilih Member ::.</option>
                                    @foreach ($member as $mb)
                                        <option {{ old('id_member') == $mb->id ? 'selected' : '' }}
                                            value="{{ $mb->id }}">
                                            {{ $mb->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_paket">Nama Paket <sup class="text-danger">*</sup></label>
                                <select class="form-control" id="id_paket" name="id_paket" required>
                                    <option> .:: Pilih Paket ::.</option>
                                    @foreach ($paket as $pt)
                                        <option {{ old('id_paket') == $pt->id ? 'selected' : '' }}
                                            value="{{ $pt->id }}">
                                            {{ $pt->nama }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="qty">Quantity Paket <sup class="text-danger">*</sup></label>
                                <input type="number" class="form-control" id="qty" name="qty"
                                    placeholder="Masukkan Quantity Paket" value="{{ old('qty') }}" step="0.1"
                                    max="2" required>
                            </div>
                            <div class="form-group">
                                <label for="tgl">Tanggal Transaksi <sup class="text-danger">*</sup></label>
                                <input type="date" class="form-control" id="tgl" name="tgl"
                                    placeholder="Masukkan Tanggal Transaksi" value="{{ old('tgl') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="Batas Waktu">Batas Waktu <sup class="text-danger">*</sup></label>
                                <input type="date" class="form-control" id="Batas Waktu" name="batas_waktu"
                                    placeholder="Masukkan Batas Waktu Transaksi" value="{{ old('batas_waktu') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="diskon">Diskon </label>
                                <input type="number" class="form-control" id="diskon" name="diskon"
                                    placeholder="Masukkan diskon transaksi" value="{{ old('diskon') }}" step="0.1"
                                    max="5">
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer text-right">
                            <a href="{{ route('transaksi') }}" class="btn btn-warning mr-2">Kembali</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div> <!-- /.row -->
    </section><!-- /.content -->
@endsection
