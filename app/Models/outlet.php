<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class outlet extends Model
{
    use HasFactory;

    protected $table = 'tb_outlet';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'alamat',
        'tlp',
    ];

    // relation
    public function paket()
    {

        return $this->hasMany(paket::class, 'id_outlet');
    }
}
