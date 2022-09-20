<?php

namespace App\Services;

use App\Actions\Category\GetAddCategoriesAction;
use App\Actions\Category\GetSubtractCategoriesAction;
use App\Actions\Category\GetCategoryByIdAction;
use App\Actions\Category\GetCategoryWithActivitiesAction;
use App\Actions\Category\GetCategoryWithActivitiesByIdAction;
use App\Actions\Category\GetExpensesCountAction;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public function __construct(
        protected GetSubtractCategoriesAction $getSubtractCategoriesAction,
        protected GetAddCategoriesAction $getAddCategoriesAction,
        protected GetCategoryWithActivitiesAction $getCategoryWithActivitiesAction,
        protected GetCategoryByIdAction $getCategoryByIdAction,
        protected GetCategoryWithActivitiesByIdAction $getCategoryWithActivitiesByIdAction,
        protected GetExpensesCountAction $getExpensesCountAction
    ) {}

    public function getSubtractCategories(): Collection
    {
        return ($this->getSubtractCategoriesAction)();
    }

    public function getAddCategories(): Collection
    {
        return ($this->getAddCategoriesAction)();
    }

    public function getCategoryById(int $id): Category
    {
        return ($this->getCategoryByIdAction)($id);
    }

    public function getCategoryWithActivitiesByIdAction(int $id): Category
    {
        return ($this->getCategoryWithActivitiesByIdAction)($id);
    }

    public function getCategoryWithActivities(
        ?string $type = null,
        ?string $from = null,
        ?string $to = null
    ): Collection
    {
        return ($this->getCategoryWithActivitiesAction)($type, $from, $to);
    }

    public function getExpensesCount(?string $from = null, ?string $to = null): float
    {
        return ($this->getExpensesCountAction)($from, $to);
    }
}