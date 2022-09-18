<?php

namespace App\Actions\Activity;

use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class GetUserBalance
{
    public function __construct(
        protected Activity $model
    ) {}

    public function __invoke(): float
    {
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
    }
}