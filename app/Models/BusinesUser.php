<?php

namespace App\Models;

use App\Models\User;
use App\Models\Business;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusinesUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'business_id',
        'status'
    ];

    /**
     * Get all of the business for the BusinesUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class, 'business_id', 'id');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
