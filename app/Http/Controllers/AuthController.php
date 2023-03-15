<?php

namespace App\Http\Controllers;

use App\Models\member;
use App\Models\users;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;

class AuthController extends Controller
{
    protected $judulLogin = 'Login';
    protected $judulRegistrasi = 'Registrasi';
    protected $directory = 'auth';

    public function login()
    {

        return view($this->directory . ".login.main", [
            'judul' => $this->judulLogin,
        ]);
    }

    public function postLogin(Request $request)
    {

        // return $request->all();

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $credentials['username'];

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->route('dashboardAdmin')
                ->with('status', 'success')
                ->with('message', 'Selamat Datang ' . $username . '!');
        }

        return back()
            ->with('status', 'error')
            ->with('message', 'Username atau Password Salah!');
    }

    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('status', 'success')
            ->with('message', 'Berhasil Logout');
    }

    public function registration()
    {

        return view($this->directory . ".registration.main", [
            'judul' => $this->judulRegistrasi,
        ]);
    }

    public function registrationStore(Request $request)
    {

        return $request->all();

        DB::beginTransaction();

        try {

            // Memasukkan request ke dalam variabel

            $validatedDataUsers = $request->validate([
                'nama_lengkap' => 'required',
                'username' => 'required|unique:users|max:50',
                'password' => 'required|min:6',
            ]);

            // password & role
            $validatedDataUsers['password'] = Hash::make($request->password);
            $validatedDataUsers['role'] = 'Member';

            $users = users::create($validatedDataUsers);

            if ($users) {

                $validatedDataMember = $request->validate([
                    'email' => 'required|unique:member|email:rfc',
                    'no_telp' => 'required|max:15',
                    'alamat_lengkap' => 'required',
                    'jenis_kelamin' => 'required',
                ]);

                // Users_id & status
                $validatedDataMember['users_id'] = users::orderBy('id', 'DESC')->first()->id;
                $validatedDataMember['status_member'] = 'Aktif';

                member::create($validatedDataMember);

                DB::commit();

                return redirect()->route('login')->with('status', 'success')->with('message', 'Berhasil Registrasi Data User');
            }
        } catch (Throwable $th) {

            DB::rollBack();

            return back()->withInput()->with('status', 'error')->with('message', $th->getMessage());
        }
    }
}
