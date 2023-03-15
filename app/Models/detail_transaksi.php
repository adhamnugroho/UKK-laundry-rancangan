<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_transaksi extends Model
{
    use HasFactory;

    protected $table = 'tb_detail_transaksi';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_transaksi',
        'id_paket',
        'qty',
        'keterangan'
    ];

    // relation
    public function paket()
    {

        return $this->belongsTo(paket::class, 'id_paket');
    }

    public function transaksi()
    {

        return $this->belongsTo(transaksi::class, 'id_transaksi');
    }
}
