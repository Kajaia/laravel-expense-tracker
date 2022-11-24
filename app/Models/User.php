<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'currency'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['currency_symbol'];

    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class);
    }

    public function getCurrencySymbolAttribute(): String
    {
        return match($this->currency) {
            'gel' => '₾',
            'usd' => '$',
            'eur' => '€'
        };
    }
}
