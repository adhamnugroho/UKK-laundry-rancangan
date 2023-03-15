<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $judul = 'Dashboard';
    protected $menu = 'dashboard';
    protected $sub_menu = '';
    protected $directory = 'admin.dashboard';

    public function main()
    {

        return view($this->directory . ".main", [
            'judul' => $this->judul,
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
        ]);
    }
}
