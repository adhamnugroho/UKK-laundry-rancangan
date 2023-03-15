<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::insert("INSERT INTO tb_outlet (id, nama, alamat, tlp) VALUES 
            (1, 'Laris Laundry', 'jl. Mojopahit no 4 Mojokerto', '081293874573');
        ");
    }
}
