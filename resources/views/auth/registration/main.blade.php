<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Design by foolishdeveloper.com -->
    <title>{{ $judul }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <link rel="stylesheet" href="{{ asset('template-login/css/style-registrasi.css') }}">

    <style>
        form h5 {
            margin-top: 2%;
            text-align: center
        }
    </style>
</head>

<body>
    <div class="background-registrasi">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>


    <div class="container-form">
        <form method="POST" action="{{ route('registrasiStore') }}">

            @csrf

            <h3>Registrasi.</h3>
            <h5>Silahkan masukkan data diri anda</h5>

            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" placeholder="Masukkan Nama Lengkap" id="nama_lengkap" name="nama_lengkap" required
                value="{{ old('nama_lengkap') }}">

            <label for="username">Username</label>
            <input type="text" placeholder="Masukkan Username" id="username" name="username" required
                value="{{ old('username') }}">

            <label for="password">Password</label>
            <input type="password" placeholder="Masukkan Password" id="password" name="password" required
                value="{{ old('password') }}" minlength="6">

            <label for="email">Email</label>
            <input type="email" placeholder="Masukkan Email" id="email" name="email" required
                value="{{ old('email') }}">

            <label for="no_telp">No Telepon</label>
            <input type="tel" placeholder="Masukkan No Telepon" id="no_telp" name="no_telp" required
                value="{{ old('no_telp') }}" maxlength="15">

            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                <option value=""> .:: Pilih Jenis Kelamin ::.</option>
                <option value="L">Laki - Laki</option>
                <option value="P">Perempuan</option>
            </select>

            <label for="alamat_lengkap">Alamat Lengkap</label>
            <textarea placeholder="Masukkan Alamat Lengkap" id="alamat_lengkap" name="alamat_lengkap" required>{{ old('alamat_lengkap') }}</textarea>

            <button type="submit">Simpan</button>
            <p class="text-center mt-2">Jika sudah mempunyai akun, bisa <a href="{{ route('login') }}">Login</a></p>
        </form>

    </div>


    <script src="{{ asset('template-login/plugins/jQuery/jQuery-2.1.3.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
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


</body>

</html>
