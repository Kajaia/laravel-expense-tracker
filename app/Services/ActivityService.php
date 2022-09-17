<?php

namespace App\Services;

use App\Actions\Activity\AddActivityAction;
use App\Models\Activity;

class ActivityService
{
    public function __construct(
        protected AddActivityAction $addActivityAction
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
}