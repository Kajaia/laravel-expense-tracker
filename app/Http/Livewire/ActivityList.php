<?php

namespace App\Http\Livewire;

use App\Services\CategoryService;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class ActivityList extends Component
{
    use WithPagination;

    public $from;
    public $to;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['addedActivity' => '$refresh'];

    protected $queryString = ['from', 'to'];

    public function getCategoriesProperty(CategoryService $categoryService): Collection
    {
        return $categoryService->getCategoryWithActivities($this->from, $this->to);
    }
}