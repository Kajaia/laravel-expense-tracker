<?php

namespace App\Actions\Category;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class GetSubtractCategoriesAction
{
    public function __construct(
        protected Category $model
    ) {}

    public function __invoke(): Collection
    {
        return Cache::remember('subtract-categories', 60*60*24, function() {
            return $this->model->where('type', 'subtract')->get();
        });
    }
}