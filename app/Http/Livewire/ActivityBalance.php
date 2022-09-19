<?php

namespace App\Http\Livewire;

use App\Services\ActivityService;
use Livewire\Component;

class ActivityBalance extends Component
{
    protected $listeners = ['addedActivity' => 'getBalanceProperty'];

    public function getBalanceProperty(ActivityService $activityService): float
    {
        return $activityService->getBalance();
    }
}
