<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CategoryService;

class ActivityController extends Controller
{
    public function __construct(
        protected CategoryService $categoryService
    ) {}

    public function __invoke(Category $category)
    {
        return view('category', [
            'category' => $this->categoryService->getCategoryById($category->id)
        ]);
    }
}
