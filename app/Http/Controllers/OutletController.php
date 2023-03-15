<?php

namespace App\Http\Controllers;

use App\Models\outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;

class OutletController extends Controller
{

    protected $judul = 'Outlet';
    protected $menu = 'outlet';
    protected $sub_menu = '';
    protected $directoryAdmin = 'admin.outlet';

    public function main()
    {
        return view($this->directoryAdmin . ".main", [
            'judul' => $this->judul,
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
            'outlet' => outlet::all(),
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

        // return $request->all();

        DB::beginTransaction();

        try {

            $validatedDataOutlet = $request->validate([
                'nama' => 'required|max:100',
                'tlp' => 'required|max:15',
                'alamat' => 'required',
            ]);

            outlet::create($validatedDataOutlet);

            DB::commit();

            return redirect()->route('outlet')->with('status', 'success')->with('message', 'Berhasil Menambah Data');
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
            'outlet' => outlet::where('id', $id)->first(),
        ]);
    }

    public function edit($id)
    {
        return view($this->directoryAdmin . ".edit", [
            'judul' => $this->judul,
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
            'outlet' => outlet::where('id', $id)->first(),
        ]);
    }

    public function update(Request $request)
    {

        DB::beginTransaction();

        try {

            $outlet = outlet::where('id', $request->id)->first();

            $validatedDataOutlet = $request->validate([
                'nama' => 'required|max:100',
                'tlp' => 'required|max:15',
                'alamat' => 'required',
            ]);

            $outlet->update($validatedDataOutlet);

            DB::commit();

            return redirect()->route('outlet')->with('status', 'success')->with('message', 'Berhasil Menambah Data');
        } catch (Throwable $th) {

            DB::rollBack();

            return back()->withInput()->with('status', 'error')->with('message', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {

            $outlet = outlet::where('id', $id)->first();

            $outlet->delete();

            return redirect()->route('outlet')->with('status', 'success')->with('message', 'Berhasil Menghapus Data');
        } catch (\Throwable $th) {
            return back()->withInput()->with('status', 'error')->with('message', $th->getMessage());
        }
    }
}
