<?php

namespace App\Actions\Category;

use App\Models\Activity;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class GetExpensesCountAction
{
    public function __construct(
        protected Activity $model
    ) {}

    public function __invoke(?string $from = null, ?string $to = null): float
    {
        return $this->model::with('category')
            ->whereHas('category', function($query) {
                $query->where('type', 'subtract');
            })
            ->where('user_id', Auth::user()->id)
            ->when($from && $to, function($query) use ($from, $to) {
                $query->whereBetween('created_at', [
                    $from.' 00:00:00',
                    $to.' 23:59:59'
                ]);
            }, function($query) {
                $query->whereBetween('created_at', [
                    Carbon::now()->subMonth()->format('Y-m-d').' 00:00:00',
                    Carbon::now()->format('Y-m-d H:i:s')
                ]);
            })->sum('amount');
    }
}