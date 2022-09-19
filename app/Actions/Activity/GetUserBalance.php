<?php

namespace App\Actions\Activity;

use App\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class GetUserBalance
{
    public function __construct(
        protected Activity $model
    ) {}

    public function __invoke(): float
    {
        return Cache::remember('balance_'.Auth::user()->id, 60*60*24, function() {
            $added = $this->model::with('category')
            ->whereHas('category', function($query) {
                $query->where('type', 'add');
            })
            ->where('user_id', Auth::user()->id)
            ->sum('amount');
            
            $subtracted = $this->model::with('category')
                ->whereHas('category', function($query) {
                    $query->where('type', 'subtract');
                })
                ->where('user_id', Auth::user()->id)
                ->sum('amount');

            return $added - $subtracted; 
        });
    }
}