<?php

namespace App\Services;

use App\Actions\Category\GetCategoriesAction;
use App\Actions\Category\GetCategoryByIdAction;
use App\Actions\Category\GetCategoryWithActivitiesAction;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public function __construct(
        protected GetCategoriesAction $getCategoriesAction,
        protected GetCategoryWithActivitiesAction $getCategoryWithActivitiesAction,
        protected GetCategoryByIdAction $getCategoryByIdAction
    ) {}

    public function getCategories(string $type): Collection
    {
        return ($this->getCategoriesAction)($type);
    }

    public function getCategoryById(int $id): Category
    {
        return ($this->getCategoryByIdAction)($id);
    }

    public function getCategoryWithActivities(
        ?string $type = null,
        ?string $from = null,
        ?string $to = null
    ): Collection
    {
        return ($this->getCategoryWithActivitiesAction)($type, $from, $to);
    }
}