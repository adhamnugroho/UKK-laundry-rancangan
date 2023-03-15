<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    use HasFactory;

    protected $table = 'tb_member';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'alamat',
        'jenis_kelamin',
        'tlp',
    ];

    // relation
    public function transaksi()
    {

        return $this->hasMany(transaksi::class, 'id_member');
    }

    public function users()
    {

        return $this->belongsTo(users::class, 'id_user');
    }
}
