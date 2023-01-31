<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'icon',
        'type'
    ];

    public function activities(): HasMany
    {
        $from = request('from');
        $to = request('to');

        return $this->hasMany(Activity::class)
            ->where('user_id', auth()->user()->id)
            ->when($from && $to, function ($query) use ($from, $to) {
                $query->whereBetween('created_at', [
                    $from . ' 00:00:00',
                    $to . ' 23:59:59'
                ]);
            })->orderBy('created_at', 'desc');
    }
}
