<?php

namespace App\Http\Controllers;

use App\Models\outlet;
use App\Models\paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class PaketController extends Controller
{
    protected $judul = 'Paket';
    protected $menu = 'paket';
    protected $sub_menu = '';
    protected $directoryAdmin = 'admin.paket';

    public function main()
    {
        return view($this->directoryAdmin . ".main", [
            'judul' => $this->judul,
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
            'paket' => paket::with('outlet')->get(),
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

            $validatedDataPaket = $request->validate([
                'id_outlet' => 'required',
                'jenis' => 'required',
                'nama' => 'required|max:100',
                'harga' => 'required',
            ]);

            paket::create($validatedDataPaket);

            DB::commit();

            return redirect()->route('paket')->with('status', 'success')->with('message', 'berhasil menambahkan data');
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
            'paket' => paket::where('id', $id)->first(),
            'outlet' => outlet::all(),
        ]);
    }

    public function edit($id)
    {

        return view($this->directoryAdmin . ".edit", [
            'judul' => $this->judul,
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
            'paket' => paket::where('id', $id)->first(),
            'outlet' => outlet::all(),
        ]);
    }

    public function update(Request $request)
    {

        DB::beginTransaction();

        try {

            $paket = paket::where('id', $request->id)->first();

            $validatedDataPaket = $request->validate([
                'id_outlet' => 'required',
                'jenis' => 'required',
                'nama' => 'required|max:100',
                'harga' => 'required',
            ]);

            $paket->update($validatedDataPaket);

            DB::commit();

            return redirect()->route('paket')->with('status', 'success')->with('message', 'Berhasil Mengupdate Data');
        } catch (Throwable $th) {

            DB::rollBack();

            return back()->withInput()->with('status', 'success')->with('message', $th->getMessage());
        }
    }

    public function destroy($id)
    {

        try {

            $paket = paket::where('id', $id)->first();

            $paket->delete();

            return redirect()->route('paket')->with('status', 'success')->with('message', 'Berhasil Menghapus Data');
        } catch (\Throwable $th) {

            return back()->withInput()->with('status', 'error')->with('message', $th->getMessage());
        }
    }
}
