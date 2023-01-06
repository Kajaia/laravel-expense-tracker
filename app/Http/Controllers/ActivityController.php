<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Category;
use App\Services\ActivityService;
use App\Services\CategoryService;

class ActivityController extends Controller
{
    public function __construct(
        protected CategoryService $categoryService,
        protected ActivityService $activityService
    ) {
    }

    public function show(Category $category)
    {
        return view('category', [
            'category' => $this->categoryService->getCategoryById($category->id)
        ]);
    }

    public function destroy(Category $category, Activity $activity)
    {
        return $this->activityService->removeActivity($activity->id);
    }
}
