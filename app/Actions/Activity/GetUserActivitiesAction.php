<?php

namespace App\Actions\Activity;

use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class GetUserActivitiesAction
{
    public function __construct(
        protected Activity $model
    ) {}

    public function __invoke()
    {
        return $this->model::with('category')
            ->where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->simplePaginate(10);
    }
}