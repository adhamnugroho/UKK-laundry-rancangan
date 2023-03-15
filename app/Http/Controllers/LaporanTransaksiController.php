<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;

class LaporanTransaksiController extends Controller
{
    protected $judul = 'Laporan';
    protected $menu = 'laporan';
    protected $sub_menu = '';
    protected $directoryAdmin = 'admin.laporan';

    public function main(Request $request)
    {

        // 

        return view($this->directoryAdmin . ".main", [
            'judul' => $this->judul,
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
            'member' => transaksi::with('detail_transaksi')->get(),
        ]);
    }
}
