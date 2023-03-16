<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Clean Laundry | {{ $judul }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset('template-admin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset('template-admin/dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{ asset('template-admin/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{ asset('template-admin/plugins/iCheck/flat/blue.css') }}" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="{{ asset('template-admin/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="{{ asset('template-admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- Date Picker -->
    <link href="{{ asset('template-admin/plugins/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="{{ asset('template-admin/plugins/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="{{ asset('template-admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}"
        rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="{{ asset('template-admin/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet"
        type="text/css" />
    {{-- Custom css --}}
    <link rel="stylesheet" href="{{ asset('template-admin/bootstrap/css/style-custom.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-blue">

    <h1 class="text-center">Laporan Transaksi</h1>
    <p class="text-center mb-3">Dari tanggal: {{ $tanggal_awal }} sampai tanggal: {{ $tanggal_akhir }}</p>

    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Invoice</th>
                <th>Nama Member</th>
                <th>Nama User</th>
                <th>Nama Paket</th>
                <th>Quantity</th>
                <th>Tanggal Transaksi</th>
                <th>Batas Waktu</th>
                <th>Tanggal Pembayaran</th>
                <th>Total Harga</th>
                <th>Diskon</th>
                <th>Pajak</th>
                <th>Status Transaksi</th>
                <th>Status Pembayaran</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $key => $tr)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $tr->kode_invoice }}</td>
                    <td>{{ $tr->member->nama }}</td>
                    <td>{{ $tr->users->nama }}</td>
                    <td>{{ $tr->detail_transaksi[0]->paket->nama }}</td>
                    <td>{{ $tr->detail_transaksi[0]->qty }}</td>
                    <td>{{ $tr->tgl }}</td>
                    <td>{{ $tr->batas_waktu }}</td>
                    <td>{{ $tr->tgl_bayar }}</td>
                    <td>{{ $tr->total_harga }}</td>
                    <td>{{ $tr->diskon }}</td>
                    <td>{{ $tr->pajak }}</td>
                    <td>{{ $tr->status }}</td>
                    <td>{{ $tr->dibayar }}</td>
                    <td>{{ $tr->detail_transaksi[0]->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Kode Invoice</th>
                <th>Nama Member</th>
                <th>Nama User</th>
                <th>Nama Paket</th>
                <th>Quantity</th>
                <th>Tanggal Transaksi</th>
                <th>Batas Waktu</th>
                <th>Tanggal Pembayaran</th>
                <th>Total Harga</th>
                <th>Diskon</th>
                <th>Pajak</th>
                <th>Status Transaksi</th>
                <th>Status Pembayaran</th>
                <th>Keterangan</th>
            </tr>
        </tfoot>
    </table>

    <!-- jQuery 2.1.3 -->
    <script src="{{ asset('template-admin/plugins/jQuery/jQuery-2.1.3.min.js') }}"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset('template-admin/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{ asset('template-admin/plugins/morris/morris.min.js') }}" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="{{ asset('template-admin/plugins/sparkline/jquery.sparkline.min.js') }}" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="{{ asset('template-admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('template-admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"
        type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('template-admin/plugins/knob/jquery.knob.js') }}" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('template-admin/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="{{ asset('template-admin/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('template-admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"
        type="text/javascript"></script>
    <!-- iCheck -->
    <script src="{{ asset('template-admin/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('template-admin/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript">
    </script>
    <!-- FastClick -->
    <script src='{{ asset('template-admin/plugins/fastclick/fastclick.min.js') }}'></script>
    <!-- DATA TABES SCRIPT -->
    <script src="{{ asset('template-admin/plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
    <script src="{{ asset('template-admin/plugins/datatables/dataTables.bootstrap.js') }}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('template-admin/dist/js/app.min.js') }}" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('template-admin/dist/js/pages/dashboard.js') }}" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('template-admin/dist/js/demo.js') }}" type="text/javascript"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script>
        $(function() {
            $("#example1").dataTable();
            $('#example2').dataTable({
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": false,
                "bSort": true,
                "bInfo": true,
                "bAutoWidth": false
            });
        });
    </script>

    <script>
        @if (Session::has('status'))

            @if (Session::get('status') == 'success')

                Toast.fire({

                    icon: '{{ Session::get('status') }}',
                    title: '{{ Session::get('message') }}',
                })
            @else

                Toast.fire({

                    icon: '{{ Session::get('status') }}',
                    title: '{{ Session::get('message') }}',
                })
            @endif
        @endif
    </script>

    <script>
        window.print();
        window.onfocus = function() {
            window.close();
        }
    </script>
</body>

</html>
