<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;

    protected $table = 'tb_user';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'username',
        'password',
        'id_outlet',
        'role'
    ];

    // relation
    public function outlet()
    {

        return $this->hasMany(outlet::class, 'id_user');
    }

    public function transaksi()
    {

        return $this->hasMany(transaksi::class, 'users_id');
    }
}
