<?php

namespace App\Services;

use App\Actions\Category\GetCategoriesAction;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public function __construct(
        protected GetCategoriesAction $getCategoriesAction
    ) {}

    public function getCategories(string $type): Collection
    {
        return ($this->getCategoriesAction)($type);
    }
}