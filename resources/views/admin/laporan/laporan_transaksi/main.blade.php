@extends('admin.layout.app')


@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data {{ $judul }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboardAdmin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Data {{ $judul }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Tabel {{ $judul }}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">

                        <div class="row mb-2">

                            <input type="date" name="tanggal_awal" id="tanggal_awal" class="col-md-2 ml-2">

                            <div class="col-md-1 text-center fs-3">-</div>

                            <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="col-md-2">

                            <div class="col-md-4 text-right">
                                <button class="btn btn-primary btn-sm mb-2" onclick="cariData()">
                                    Cari Data {{ $sub_menu }}
                                </button>
                            </div>

                            <div class="col-md-2 ">
                                <button class="btn btn-primary btn-sm mb-2" onclick="printData()">
                                    Print {{ $sub_menu }}
                                </button>
                            </div>


                        </div>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Invoice</th>
                                    <th>Nama Paket</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Status Transaksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi as $key => $tr)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $tr->kode_invoice }}</td>
                                        <td>{{ $tr->detail_transaksi[0]->paket->nama }}</td>
                                        <td>{{ date_format(date_create($tr->tgl), 'd-m-Y') }}</td>
                                        <td>{{ $tr->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Invoice</th>
                                    <th>Nama Paket</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Status Transaksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
@endsection


@section('script')
    <script>
        function cariData() {
            let tanggal_awal = document.getElementById("tanggal_awal").value;
            let tanggal_akhir = document.getElementById("tanggal_akhir").value;

            if (tanggal_awal != "" && tanggal_akhir != "") {

                window.open(
                    `{{ route('laporanTransaksi') }}?tanggal_awal=${tanggal_awal}&tanggal_akhir=${tanggal_akhir}`,
                    '_self');
            } else {

                alert("kolom tanggal ada yang kosong!")
            }



        }

        function printData() {
            let tanggal_awal = document.getElementById("tanggal_awal").value;
            let tanggal_akhir = document.getElementById("tanggal_akhir").value;

            if (tanggal_awal != "" && tanggal_akhir != "") {

                window.open(
                    `{{ route('laporanTransaksiPrint') }}?tanggal_awal=${tanggal_awal}&tanggal_akhir=${tanggal_akhir}`,
                    '_self');
            } else {

                if (confirm("Anda ingin meng-print semua data transaksi?")) {
                    window.open(
                        `{{ route('laporanTransaksiPrint') }}`, '_self');
                } else {
                    alert("Pembuatan laporan dibatalkan")
                }


            }

        }
    </script>
@endsection
