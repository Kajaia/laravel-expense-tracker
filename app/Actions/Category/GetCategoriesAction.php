<?php

namespace App\Actions\Category;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class GetCategoriesAction
{
    public function __construct(
        protected Category $model
    ) {}

    public function __invoke(string $type): Collection
    {
        return $this->model->where('type', $type)->get();
    }
}