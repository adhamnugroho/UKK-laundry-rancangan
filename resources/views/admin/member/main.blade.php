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

                        <a href="{{ route('memberCreate') }}" class="btn btn-primary btn-sm mb-2">
                            Registasi {{ $judul }}
                        </a>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($member as $key => $mb)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $mb->nama }}</td>
                                        <td>{{ $mb->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                                        <td>
                                            <a href="{{ route('memberShow', $mb->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('memberEdit', $mb->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('memberDelete', $mb->id) }}" class="btn btn-danger btn-sm"
                                                id="button-delete"
                                                onclick="return confirm('Apakah anda ingin menghapus user ini?')">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Kelamin</th>
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
