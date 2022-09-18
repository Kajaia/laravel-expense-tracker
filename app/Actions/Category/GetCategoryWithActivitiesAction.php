<?php

namespace App\Actions\Category;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class GetCategoryWithActivitiesAction
{
    public function __construct(
        protected Category $model
    ) {}

    public function __invoke(
        ?string $type = null,
        ?string $from = null,
        ?string $to = null
    )
    {
        return $this->model::with('activities')
            ->when($type, function($query) use ($type) {
                $query->where('type', $type);
            })
            ->whereHas('activities', function($query) use ($from, $to) {
                $query->where('user_id', Auth::user()->id)
                    ->when($from && $to, function($query) use ($from, $to) {
                        $query->whereBetween('created_at', [
                            $from.' 00:00:00',
                            $to.' 23:59:59'
                        ]);
                    }, function($query) {
                        $query->whereBetween('created_at', [
                            Carbon::now()->subMonth()->format('Y-m-d').' 00:00:00',
                            Carbon::now()->format('Y-m-d H:i:s')
                        ]);
                    });
            })->get();
    }
}