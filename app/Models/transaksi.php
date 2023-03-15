<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;

    protected $table = 'tb_transaksi';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_outlet',
        'kode_invoice',
        'id_member',
        'tgl',
        'batas_waktu',
        'tgl_bayar',
        'total_harga',
        'diskon',
        'pajak',
        'status',
        'dibayar',
        'id_user',
    ];

    // relation
    public function detail_transaksi()
    {

        return $this->hasMany(detail_transaksi::class, 'id_transaksi');
    }

    public function outlet()
    {

        return $this->belongsTo(outlet::class, 'id_outlet');
    }

    public function member()
    {

        return $this->belongsTo(member::class, 'id_member');
    }

    public function users()
    {

        return $this->belongsTo(users::class, 'id_user');
    }
}
