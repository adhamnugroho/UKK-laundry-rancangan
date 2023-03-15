<?php

namespace App\Http\Controllers;

use App\Models\member;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;

class MemberController extends Controller
{
    protected $judul = 'Member';
    protected $menu = 'member';
    protected $sub_menu = '';
    protected $directoryAdmin = 'admin.member';

    public function main()
    {
        return view($this->directoryAdmin . ".main", [
            'judul' => $this->judul,
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
            'member' => member::with('users')->get(),
        ]);
    }

    public function create()
    {
        return view($this->directoryAdmin . ".add", [
            'judul' => $this->judul,
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
        ]);
    }

    public function store(Request $request)
    {

        DB::beginTransaction();

        try {

            $validatedDataMember = $request->validate([
                'nama' => 'required|max:100',
                'tlp' => 'required|max:15',
                'alamat' => 'required',
                'jenis_kelamin' => 'required',
            ]);

            member::create($validatedDataMember);

            DB::commit();

            return redirect()->route('member')->with('status', 'success')->with('message', 'Berhasil Menambah Data');
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
            'member' => member::with('users')->where('id', $id)->first(),
        ]);
    }

    public function edit($id)
    {

        return view($this->directoryAdmin . ".edit", [
            'judul' => $this->judul,
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
            'member' => member::with('users')->where('id', $id)->get(),
        ]);
    }

    public function update(Request $request)
    {

        DB::beginTransaction();

        try {

            $member = member::where('id', $request->id)->first();

            $validatedDataMember = $request->validate([
                'nama' => 'required',
                'tlp' => 'required|max:15',
                'alamat' => 'required',
                'jenis_kelamin' => 'required',
            ]);

            $member->update($validatedDataMember);

            DB::commit();

            return redirect()->route('member')->with('status', 'success')->with('message', 'Berhasil Update Data Member');
        } catch (Throwable $th) {

            DB::rollBack();

            return back()->withInput()->with('status', 'error')->with('message', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {

            $member = member::where('id', $id)->first();

            $member->delete();

            return redirect()->route('member')->with('status', 'success')->with('message', 'Berhasil Menghapus Data');
        } catch (\Throwable $th) {
            return back()->withInput()->with('status', 'error')->with('message', $th->getMessage());
        }
    }
}
