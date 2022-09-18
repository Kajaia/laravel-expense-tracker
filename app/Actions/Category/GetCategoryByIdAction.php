<?php

namespace App\Actions\Category;

use App\Models\Category;

class GetCategoryByIdAction
{
    public function __construct(
        protected Category $model
    ) {}

    public function __invoke(int $id): Category
    {
        return $this->model::findOrFail($id);
    }
}