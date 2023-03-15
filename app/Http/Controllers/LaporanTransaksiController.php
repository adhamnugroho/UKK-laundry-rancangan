<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;

class LaporanTransaksiController extends Controller
{
    protected $judul = 'Laporan Transaksi';
    protected $menu = 'laporan_transaksi';
    protected $sub_menu = 'transaksi';
    protected $directoryAdmin = 'admin.laporan.laporan_transaksi';

    public function main(Request $request)
    {

        if (!empty($request->tanggal_awal) && !empty($request->tanggal_akhir)) {

            return view($this->directoryAdmin . ".main", [
                'judul' => $this->judul,
                'menu' => $this->menu,
                'sub_menu' => $this->sub_menu,
                'transaksi' => transaksi::with(['detail_transaksi.paket', 'outlet', 'member', 'users'])->whereBetween('tgl', [$request->tanggal_awal, $request->tanggal_akhir])->get(),
            ]);
        } else {

            return view($this->directoryAdmin . ".main", [
                'judul' => $this->judul,
                'menu' => $this->menu,
                'sub_menu' => $this->sub_menu,
                'transaksi' => transaksi::with('detail_transaksi')->get(),
            ]);
        }
    }

    public function print(Request $request)
    {

        if (!empty($request->tanggal_awal) && !empty($request->tanggal_akhir)) {

            return view($this->directoryAdmin . ".print", [
                'judul' => $this->judul,
                'menu' => $this->menu,
                'sub_menu' => $this->sub_menu,
                'transaksi' => transaksi::with(['detail_transaksi.paket', 'outlet', 'member', 'users'])->whereBetween('tgl', [$request->tanggal_awal, $request->tanggal_akhir])->get(),
            ]);
        } else {

            return view($this->directoryAdmin . ".print", [
                'judul' => $this->judul,
                'menu' => $this->menu,
                'sub_menu' => $this->sub_menu,
                'member' => transaksi::with('detail_transaksi')->get(),
            ]);
        }
    }
}
