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

                        <a href="{{ route('transaksiCreate') }}" class="btn btn-primary btn-sm mb-2">
                            Registasi {{ $judul }}
                        </a>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Invoice</th>
                                    <th>Nama Paket</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Status Transaksi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi as $key => $tr)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $tr->kode_invoice }}</td>
                                        <td>{{ $tr->detail_transaksi[0]->paket->nama }}</td>
                                        <td>{{ $tr->tgl }}</td>
                                        <td>{{ $tr->status }}</td>
                                        <td>
                                            <a href="{{ route('transaksiShow', $tr->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Invoice</th>
                                    <th>Nama Paket</th>
                                    <th>Tanggal</th>
                                    <th>Status Transaksi</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
@endsection
