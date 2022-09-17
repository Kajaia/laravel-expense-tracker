<?php

namespace App\Actions\Activity;

use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class GetUserBalance
{
    public function __construct(
        protected Activity $model
    ) {}

    public function __invoke(): int
    {
        return $this->model::where('user_id', Auth::user()->id)->sum('amount');
    }
}