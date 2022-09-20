<?php

namespace App\Http\Livewire;

use App\Services\CategoryService;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class ActivityList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['addedActivity' => '$refresh'];

    public function getCategoriesProperty(CategoryService $categoryService): Collection
    {
        return $categoryService->getCategoryWithActivities(
            null,
            request('from'),
            request('to')
        );
    }
}
