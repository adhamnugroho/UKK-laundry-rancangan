<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paket extends Model
{
    use HasFactory;

    protected $table = 'tb_paket';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_outlet',
        'jenis',
        'nama',
        'harga',
    ];

    // relation
    public function detail_transaksi()
    {

        return $this->hasMany(detail_transaksi::class, 'id_paket');
    }

    public function outlet()
    {

        return $this->belongsTo(outlet::class, 'id_outlet');
    }
}
