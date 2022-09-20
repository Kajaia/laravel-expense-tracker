<?php

namespace App\Http\Livewire;

use App\Services\CategoryService;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ChartData extends Component
{
    public function getExpensesProperty(CategoryService $categoryService): Collection
    {
        return $categoryService->getCategoryWithActivities(
            'subtract',
            request('from'),
            request('to')
        );
    }
}
