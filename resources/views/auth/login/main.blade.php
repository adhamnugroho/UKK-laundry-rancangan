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
    <link rel="stylesheet" href="{{ asset('template-login/css/style.css') }}">
</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="POST" action="{{ route('postLogin') }}">

        @csrf

        <h3>Login.</h3>

        <label for="username">Username</label>
        <input type="text" placeholder="Masukkan Username" id="username" name="username" required>

        <label for="password">Password</label>
        <input type="password" placeholder="Masukkan Password" id="password" name="password" required>

        <button type="submit">Log In</button>

        <br><br>

        {{-- <p id="teks_belum_punya_akun">Jika belum memiliki akun, bisa </p>
        <a href="{{ route('registrasi') }}" id="registrasi">Registrasi</a> --}}
    </form>


    <script src="{{ asset('template-login/plugins/jQuery/jQuery-2.1.3.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script>
        function tombolHidePassword() {

        }
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
