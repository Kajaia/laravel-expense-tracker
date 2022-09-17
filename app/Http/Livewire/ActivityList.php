<?php

namespace App\Http\Livewire;

use App\Services\ActivityService;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class ActivityList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['addedActivity' => '$refresh'];

    public function getActivitiesProperty(ActivityService $activityService): Paginator
    {
        return $activityService->getActivities();
    }
}
