<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Business extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'busines_users_id',
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

    /**
     * Get the access that owns the Business
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function access(): BelongsTo
    {
        return $this->belongsTo(BusinessUser::class, 'busines_users_id', 'id');
    }



}
