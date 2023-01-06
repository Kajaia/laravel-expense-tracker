<?php

namespace App\Services;

use App\Actions\Activity\AddActivityAction;
use App\Actions\Activity\GetUserActivitiesAction;
use App\Actions\Activity\GetUserBalance;
use App\Models\Activity;
use Illuminate\Http\RedirectResponse;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;

class ActivityService
{
    public function __construct(
        protected AddActivityAction $addActivityAction,
        protected GetUserBalance $getUserBalance,
        protected GetUserActivitiesAction $getUserActivitiesAction
    ) {
    }

    public function addActivity(
        float $amount,
        ?string $note,
        int $categoryId
    ): Activity {
        return ($this->addActivityAction)(
            $amount,
            $note,
            $categoryId
        );
    }

    public function getBalance(): float
    {
        return ($this->getUserBalance)();
    }

    public function getActivities(): Paginator
    {
        return ($this->getUserActivitiesAction)();
    }

    public function removeActivity(int $id): RedirectResponse
    {
        Activity::destroy($id);

        Cache::pull('balance_' . auth()->user()->id);

        return back();
    }
}
