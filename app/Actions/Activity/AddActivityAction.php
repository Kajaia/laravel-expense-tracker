<?php

namespace App\Actions\Activity;

use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class AddActivityAction
{
    public function __construct(
        protected Activity $model
    ) {}

    public function __invoke(
        float $amount,
        ?string $note,
        int $categoryId
    ): Activity
    {
        return $this->model->create([
            'amount' => $amount,
            'note' => $note,
            'category_id' => $categoryId,
            'user_id' => Auth::user()->id
        ]);
    }
}