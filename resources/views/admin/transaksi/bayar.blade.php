@extends('admin.layout.app')


@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pembayaran {{ $judul }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboardAdmin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ route('transaksi') }}">Data {{ $judul }}</a></li>
            <li><a href="{{ route('transaksiShow', $transaksi->id) }}">Data {{ $judul }}</a></li>
            <li class="active">Pembayaran {{ $judul }}</li>
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
                        <h3 class="box-title">Form Pembayaran {{ $judul }}</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('transaksiPostBayar') }}">

                        @csrf

                        <div class="box-body">
                            <input type="hidden" name="id" value="{{ $transaksi->id }}">
                            <div class="form-group">
                                <label for="total_harga">Total Harga Transaksi <sup class="text-danger">*</sup></label>
                                <input type="number" class="form-control" id="total_harga" name="total_harga"
                                    value="{{ $transaksi->total_harga }}" min="20000" required disabled>
                            </div>
                            <div class="form-group">
                                <label for="nominal_pembayaran">Nominal Pembayaran <sup class="text-danger">*</sup></label>
                                <input type="number" class="form-control" id="nominal_pembayaran_1"
                                    name="nominal_pembayaran" placeholder="Masukkan Nominal Pembayaran"
                                    value="{{ $transaksi->nominal_pembayaran }}" required inputmode="numeric"
                                    autocomplete="transaction-currency">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan </label>
                                <textarea class="form-control" rows="3" placeholder="Masukkan Keterangan" id="keterangan" name="keterangan">{{ old('keterangan') }}</textarea>
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

@section('script')
    <script>
        $(document).ready(function() {
            minimalPembayaran();
        })

        function minimalPembayaran() {
            let total_harga = document.getElementById("total_harga").value;
            let nominal_pembayaran = document.getElementById("nominal_pembayaran_1");

            nominal_pembayaran.setAttribute("min", total_harga);
        }
    </script>
@endsection
