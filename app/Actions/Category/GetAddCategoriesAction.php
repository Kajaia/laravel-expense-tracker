<?php

namespace App\Actions\Category;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class GetAddCategoriesAction
{
    public function __construct(
        protected Category $model
    ) {}

    public function __invoke(): Collection
    {
        return $this->model->where('type', 'add')->get();
    }
}