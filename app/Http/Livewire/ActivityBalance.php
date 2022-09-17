<?php

namespace App\Http\Livewire;

use App\Services\ActivityService;
use Livewire\Component;

class ActivityBalance extends Component
{
    protected $listeners = ['addedActivity' => '$refresh'];

    public function getBalanceProperty(ActivityService $activityService): int
    {
        return $activityService->getBalance();
    }
}
