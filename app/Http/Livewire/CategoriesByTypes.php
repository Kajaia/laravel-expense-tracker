<?php

namespace App\Http\Livewire;

use App\Services\CategoryService;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class CategoriesByTypes extends Component
{
    protected CategoryService $categoryService;

    public $type;

    public function mount(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function getCategoriesProperty(): Collection
    {
        return $this->type === 'add'
            ? $this->categoryService->getAddCategories()
            : $this->categoryService->getSubtractCategories();
    }

    public function chooseCategory(int $id)
    {
        $this->emit('categoryChosen', $id);
    }
}
