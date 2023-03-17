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
                                <label for="qty">Quantity Paket (Kg) max.20kg <sup class="text-danger">*</sup></label>
                                <input type="number" class="form-control" id="qty" name="qty"
                                    placeholder="Masukkan Quantity Paket" value="{{ old('qty') }}" step="0.1"
                                    max="20" required>
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
                                <label for="diskon">Diskon (%) max.100%</label>
                                <input type="number" class="form-control" id="diskon" name="diskon"
                                    placeholder="Masukkan diskon transaksi" value="{{ old('diskon') }}" max="100">
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


@section('script')
    <script>

        $(document).ready(function() {
            setMinTanggal();
        });

        function setMinTanggal() {

            // Fitur dinamic day in min attribute input:date id"tanggal_penyewaan" dan id"tanggal_pengembalian"
            let inputDatesTanggalAwal = document.getElementById('tanggal_awal');
            let inputDatesTanggalAkhir = document.getElementById('tanggal_akhir');
            // Mendapatkan tanggal hari ini
            var tanggalSekarang = new Date();
            // Menambahkan 1 hari pada tanggal hari ini
            tanggalSekarang.setDate(tanggalSekarang.getDate() + 2);
            // Mengambil bagian tanggal, bulan, dan tahun dari tanggal hari ini
            var tanggal = tanggalSekarang.getDate();
            var bulan = tanggalSekarang.getMonth() + 1;
            var tahun = tanggalSekarang.getFullYear();
            // Menambahkan 0 di depan tanggal dan bulan jika kurang dari 10
            if (tanggal < 10) {
                tanggal = "0" + tanggal;
            }
            if (bulan < 10) {
                bulan = "0" + bulan;
            }
            // Menyusun tanggal hari ini + 1 dalam format yyyy-mm-dd
            var tanggalHariIni = tahun + "-" + bulan + "-" + tanggal;
            // Menetapkan nilai attribute min pada elemen input dengan tanggal hari ini
            inputDatesTanggalAwal.min = tanggalHariIni;
            inputDatesTanggalAkhir.min = tanggalHariIni;
        }
    </script>
@endsection
