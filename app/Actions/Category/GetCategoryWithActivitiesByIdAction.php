<?php

namespace App\Actions\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class GetCategoryWithActivitiesByIdAction
{
    public function __construct(
        protected Category $model
    ) {}

    public function __invoke(int $id): Category
    {
        return $this->model::with('activities')
            ->whereHas('activities', function($query) {
                $query->where('user_id', Auth::user()->id);
            })->findOrFail($id);
    }
}