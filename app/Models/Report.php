<?php

namespace App\Models;

use App\Models\Business;
use App\Models\BusinesUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory,SoftDeletes;

    Protected $fillable = [
        'business_id','date','penjualan','pengeluaran','stor_bank'
    ];

    /**
     * Get the report that owns the Report
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function report(): BelongsTo
    {
        return $this->belongsTo(Business::class, 'business_id', 'id');
    }

    /**
     * Get all of the busines_user for the Report
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function busines_user(): HasMany
    {
        return $this->hasMany(BusinesUser::class, 'business_id', 'business_id');
    }

}
