<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::insert("INSERT INTO tb_user (id, nama, username, password, id_outlet, role) values 
            (1, 'Adham Nugroho', 'adham', '" . bcrypt("owner") . "', 1, 'Owner'),
            (2, 'Aditya Alan', 'alan', '" . bcrypt("admin") . "', 1, 'Admin'),
            (3, 'Adyatma Rifqi', 'adyatma', '" . bcrypt("kasir") . "', 1, 'Kasir');
        ");
    }
}
