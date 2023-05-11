<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Business extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'foto1',
        'foto2',
        'foto3',
        'foto4',
        'foto5',
        'foto6',
        'vidio_yt',
        'nama_outlet',
        'alamat',
        'kota',
        'waktu_bep',
        'estimasi_bep',
        'proposal',
        'total_saham',
        'harga_saham',
        'saham_terjual'
    ];
}
