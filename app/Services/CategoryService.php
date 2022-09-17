<?php

namespace App\Services;

use App\Actions\Category\GetAddCategoriesAction;
use App\Actions\Category\GetSubtractCategoriesAction;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public function __construct(
        protected GetAddCategoriesAction $getAddCategoriesAction,
        protected GetSubtractCategoriesAction $getSubtractCategoriesAction
    ) {}

    public function getAddCategories(): Collection
    {
        return ($this->getAddCategoriesAction)();
    }

    public function getSubtractCategories(): Collection
    {
        return ($this->getSubtractCategoriesAction)();
    }
}