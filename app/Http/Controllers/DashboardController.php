<?php

namespace App\Http\Controllers;

use App\Models\member;
use App\Models\outlet;
use App\Models\paket;
use App\Models\transaksi;
use App\Models\users;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $judul = 'Dashboard';
    protected $menu = 'dashboard';
    protected $sub_menu = '';
    protected $directory = 'admin.dashboard';

    public function main()
    {

        // jumlah transaksi pada bulan ini
        $tanggal_awal_bulan_ini = Carbon::now()->startOfMonth()->format('Y-m-d');
        $tanggal_akhir_bulan_ini = Carbon::now()->endOfMonth()->format('Y-m-d');
        $jumlah_transaksi_bulan_ini = count(transaksi::whereBetween('tgl', [$tanggal_awal_bulan_ini, $tanggal_akhir_bulan_ini])->get());

        // jumlah member sekarang
        $jumlah_member = count(member::all());

        // jumlah paket
        $jumlah_paket = count(paket::all());

        // jumlah mitra / outlet
        $jumlah_mitra = count(outlet::all());

        return view($this->directory . ".main", [
            'judul' => $this->judul,
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
            'jumlah_transaksi_bulan_ini' => $jumlah_transaksi_bulan_ini,
            'jumlah_member' => $jumlah_member,
            'jumlah_paket' => $jumlah_paket,
            'jumlah_mitra' => $jumlah_mitra,
        ]);
    }
}
