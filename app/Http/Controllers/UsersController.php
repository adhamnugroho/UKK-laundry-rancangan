<?php

namespace App\Http\Controllers;

use App\Models\outlet;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;

class UsersController extends Controller
{
    protected $judul = 'User';
    protected $menu = 'user';
    protected $sub_menu = '';
    protected $directoryAdmin = 'admin.user';

    public function main()
    {
        return view($this->directoryAdmin . ".main", [
            'judul' => $this->judul,
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
            'users' => users::where('id', '!=', Auth::id())->get(),
        ]);
    }

    public function create()
    {
        return view($this->directoryAdmin . ".add", [
            'judul' => $this->judul,
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
            'outlet' => outlet::all(),
        ]);
    }

    public function store(Request $request)
    {

        DB::beginTransaction();

        try {

            $validatedDataUser = $request->validate([
                'nama' => 'required|max:100',
                'username' => 'required|unique:tb_user|max:30',
                'id_outlet' => 'required',
                'role' => 'required',
            ]);

            $validatedDataUser['password'] = Hash::make($request->password);

            users::create($validatedDataUser);

            DB::commit();

            return redirect()->route('user')->with('status', 'success')->with('message', 'Berhasil Menambah Data');
        } catch (Throwable $th) {

            DB::rollBack();

            return back()->withInput()->with('status', 'error')->with('message', $th->getMessage());
        }
    }

    public function show($id)
    {
        return view($this->directoryAdmin . ".show", [
            'judul' => $this->judul,
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
            'users' => users::where('id', $id)->first(),
            'outlet' => outlet::all(),
        ]);
    }


    public function edit($id)
    {
        return view($this->directoryAdmin . ".edit", [
            'judul' => $this->judul,
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
            'users' => users::where('id', $id)->first(),
            'outlet' => outlet::all(),
        ]);
    }

    public function update(Request $request)
    {

        DB::beginTransaction();

        try {

            $users = users::where('id', $request->id)->first();


            $validatedDataUser = $request->validate([
                'nama' => 'required|max:100',
                'id_outlet' => 'required',
                'role' => 'required',
            ]);

            // username (unique validation)
            if ($request->username != $users->username) {

                $request->validate([
                    'username' => 'required|unique:users|max:50',
                ]);

                $validatedDataUser['username'] = $request->username;
            }

            if (!empty($request->password)) {

                $validatedDataUser['password'] = $request->password;
            }



            $users->update($validatedDataUser);

            DB::commit();

            return redirect()->route('user')->with('status', 'success')->with('message', 'Berhasil Mengupdate Data');
        } catch (Throwable $th) {

            DB::rollBack();

            return back()->withInput()->with('status', 'error')->with('message', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {

            $users = users::where('id', $id)->first();

            $users->delete();

            return redirect()->route('users')->with('status', 'success')->with('message', 'Berhasil Menghapus Data');
        } catch (\Throwable $th) {
            return back()->withInput()->with('status', 'error')->with('message', $th->getMessage());
        }
    }
}
