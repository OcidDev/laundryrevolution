<?php

namespace App\Models;

use App\Models\User;
use App\Models\Business;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusinesUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'busines_id'
    ];

    /**
     * Get all of the business for the BusinesUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function business(): HasMany
    {
        return $this->hasMany(Business::class, 'busines_id', 'id');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'users_id', 'id');
    }
}
