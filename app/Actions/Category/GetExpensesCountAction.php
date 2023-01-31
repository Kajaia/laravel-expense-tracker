<?php

namespace App\Actions\Category;

use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class GetExpensesCountAction
{
    public function __construct(
        protected Activity $model
    ) {
    }

    public function __invoke(?string $from = null, ?string $to = null): float
    {
        return $this->model::with('category')
            ->whereHas('category', function ($query) {
                $query->where('type', 'subtract');
            })
            ->where('user_id', Auth::user()->id)
            ->when($from && $to, function ($query) use ($from, $to) {
                $query->whereBetween('created_at', [
                    $from . ' 00:00:00',
                    $to . ' 23:59:59'
                ]);
            })->sum('amount');
    }
}
