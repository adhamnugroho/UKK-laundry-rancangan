@extends('admin.layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Detail Data {{ $judul }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboardAdmin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ route('transaksi') }}">Data {{ $judul }}</a></li>
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
                            <input type="hidden" name="id" value="{{ $transaksi->id }}">
                            <div class="form-group">
                                <label for="id_member">Nama Member <sup class="text-danger">*</sup></label>
                                <select class="form-control" id="id_member" name="id_member" required disabled>
                                    <option> .:: Pilih Member ::.</option>
                                    @foreach ($member as $mb)
                                        <option {{ $transaksi->id_member == $mb->id ? 'selected' : '' }}
                                            value="{{ $mb->id }}">
                                            {{ $mb->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_paket">Nama Paket <sup class="text-danger">*</sup></label>
                                <select class="form-control" id="id_paket" name="id_paket" required disabled>
                                    <option> .:: Pilih Paket ::.</option>
                                    @foreach ($paket as $pt)
                                        <option
                                            {{ $transaksi->detail_transaksi[0]->id_paket == $pt->id ? 'selected' : '' }}
                                            value="{{ $pt->id }}">
                                            {{ $pt->nama }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="qty">Quantity Paket <sup class="text-danger">*</sup></label>
                                <input type="number" class="form-control" id="qty" name="qty"
                                    placeholder="Masukkan Quantity Paket"
                                    value="{{ old('qty') ? old('qty') : $transaksi->detail_transaksi[0]->qty }}"
                                    step="0.1" max="2" required disabled>
                            </div>
                            <div class="form-group">
                                <label for="tgl">Tanggal Transaksi <sup class="text-danger">*</sup></label>
                                <input type="date" class="form-control" id="tgl" name="tgl"
                                    placeholder="Masukkan Tanggal Transaksi" value="{{ old('tgl') ? old('tgl') : $tgl }}"
                                    required disabled>
                            </div>
                            <div class="form-group">
                                <label for="batas_waktu">Batas Waktu <sup class="text-danger">*</sup></label>
                                <input type="date" class="form-control" id="batas_waktu" name="batas_waktu"
                                    placeholder="Masukkan Batas Waktu Transaksi"
                                    value="{{ old('batas_waktu') ? old('batas_waktu') : $batas_waktu }}" required disabled>
                            </div>
                            <div class="form-group">
                                <label for="total_harga">Total Harga </label>
                                <input type="number" class="form-control" id="total_harga" name="total_harga"
                                    placeholder="Masukkan Total Harga transaksi"
                                    value="{{ old('total_harga') ? old('total_harga') : number_format($transaksi->total_harga,0,",",".") }}"
                                    step="0.1" max="5" disabled>
                            </div>
                            <div class="form-group">
                                <label for="diskon">Diskon </label>
                                <input type="number" class="form-control" id="diskon" name="diskon"
                                    placeholder="Masukkan diskon transaksi"
                                    value="{{ old('diskon') ? old('diskon') : $transaksi->diskon }}" step="0.1"
                                    max="5" disabled>
                            </div>
                            <div class="form-group">
                                <label for="pajak">Pajak </label>
                                <input type="number" class="form-control" id="pajak" name="pajak"
                                    placeholder="Masukkan Pajak transaksi"
                                    value="{{ old('pajak') ? old('pajak') : $transaksi->pajak }}" step="0.1"
                                    max="5" disabled>
                            </div>
                            <div class="form-group">
                                <label for="status">Status Transaksi </label>
                                <select class="form-control" id="status" name="status" required disabled>
                                    <option> .:: Pilih Status Transaksi ::.</option>
                                    <option {{ $transaksi->status == 'baru' ? 'selected' : '' }} value="baru">
                                        Baru
                                    </option>
                                    <option {{ $transaksi->status == 'proses' ? 'selected' : '' }} value="proses">
                                        Proses
                                    </option>
                                    <option {{ $transaksi->status == 'selesai' ? 'selected' : '' }} value="selesai">
                                        Selesai
                                    </option>
                                    <option {{ $transaksi->status == 'diambil' ? 'selected' : '' }} value="diambil">
                                        Diambil
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="dibayar">Status Pembayaran </label>
                                <select class="form-control" id="dibayar" name="dibayar" required disabled>
                                    <option> .:: Pilih Status Pembayaran ::.</option>
                                    <option {{ $transaksi->dibayar == 'dibayar' ? 'selected' : '' }} value="dibayar">
                                        Sudah Dibayar
                                    </option>
                                    <option {{ $transaksi->dibayar == 'belum_dibayar' ? 'selected' : '' }}
                                        value="belum_dibayar">
                                        Belum Dibayar
                                    </option>
                                </select>
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer text-right">
                            <a href="{{ route('transaksi') }}" class="btn btn-warning mr-2">Kembali</a>
                            @if ($transaksi->status == 'baru')
                                <a href="{{ route('transaksiProses', $transaksi->id) }}"
                                    class="btn btn-danger ">Proses</a>
                            @elseif($transaksi->status == 'proses')
                                <a href="{{ route('transaksiSelesai', $transaksi->id) }}"
                                    class="btn btn-success ">Selesai</a>
                            @elseif($transaksi->status == 'selesai')
                                <a href="{{ route('transaksiPreBayar', $transaksi->id) }}"
                                    class="btn btn-primary ">Bayar</a>
                            @endif
                            {{-- <button type="submit" class="btn btn-success">Simpan</button> --}}
                        </div>
                    </form>
                </div><!-- /.box -->
            </div> <!-- /.row -->
    </section><!-- /.content -->
@endsection
