<?php

namespace App\Services;

use App\Actions\Activity\AddActivityAction;
use App\Actions\Activity\GetUserBalance;
use App\Models\Activity;

class ActivityService
{
    public function __construct(
        protected AddActivityAction $addActivityAction,
        protected GetUserBalance $getUserBalance
    ) {}

    public function addActivity(
        string $type,
        int $amount,
        ?string $note,
        int $categoryId
    ): Activity
    {
        return ($this->addActivityAction)(
            $type,
            $amount,
            $note,
            $categoryId
        );
    }

    public function getBalance(): int
    {
        return ($this->getUserBalance)();
    }
}