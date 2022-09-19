<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActivityRequest;
use App\Services\ActivityService;
use App\Services\CategoryService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ActivityController extends Controller
{
    public function __construct(
        protected ActivityService $activityService,
        protected CategoryService $categoryService
    ) {}

    public function balance(): JsonResponse
    {
        return response()->json([
            'balance' => $this->activityService->getBalance()
        ], 200);
    }

    public function addActivity(ActivityRequest $request): mixed
    {
        $category = $this->categoryService->getCategoryById($request->category_id);

        if($category->type === 'subtract') {
            if($this->activityService->getBalance() >= $request->amount) {
                Cache::decrement('balance_'.Auth::user()->id, $request->amount);

                return $this->activityService->addActivity(
                    $request->amount,
                    $request->note,
                    $request->category_id
                );
            } else {
                return response()->json([
                    'message' => 'Can\'t go below your balance'
                ], 200);
            }
        } elseif($category->type === 'add') {
            Cache::increment('balance_'.Auth::user()->id, $request->amount);

            return $this->activityService->addActivity(
                $request->amount,
                $request->note,
                $request->category_id
            );
        }
    }

    public function activities(Request $request): Collection
    {
        return $this->categoryService->getCategoryWithActivities(
            null,
            $request->from,
            $request->to
        );
    }

    public function expenses(Request $request): Collection
    {
        return $this->categoryService->getCategoryWithActivities(
            'subtract',
            $request->from,
            $request->to
        );
    }
}
