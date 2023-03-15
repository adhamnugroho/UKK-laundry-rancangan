<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::insert("INSERT INTO tb_member (id, nama, alamat, jenis_kelamin, tlp) VALUES 
            (1, 'Avan Zacky Mahesa Putra', 'jl. mutiara Kesamben, Jombang, Jawa Timur', 'L', '081293290912');
        ");
    }
}
