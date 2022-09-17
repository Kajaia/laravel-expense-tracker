<?php

namespace App\Services;

use App\Actions\Category\GetCategoriesAction;
use App\Actions\Category\GetCategoryWithActivitiesAction;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public function __construct(
        protected GetCategoriesAction $getCategoriesAction,
        protected GetCategoryWithActivitiesAction $getCategoryWithActivitiesAction
    ) {}

    public function getCategories(string $type): Collection
    {
        return ($this->getCategoriesAction)($type);
    }

    public function getCategoryWithActivities(?string $from = null, ?string $to = null): Collection
    {
        return ($this->getCategoryWithActivitiesAction)($from, $to);
    }
}