<?php

namespace App\Http\Livewire;

use App\Http\Requests\ActivityRequest;
use App\Services\ActivityService;
use App\Services\CategoryService;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ActivityForm extends Component
{
    public $type;
    public $amount;
    public $note;
    public $categoryId;

    protected $listeners = [
        'showForm' => 'getCategoriesProperty'
    ];

    public function getCategoriesProperty(
        CategoryService $categoryService
    ): Collection
    {
        return $categoryService->getCategories($this->type);
    }

    public function saveForm()
    {
        $this->validate((new ActivityRequest)->rules());

        $activityService = app(ActivityService::class);

        $activityService->addActivity(
            $this->type,
            $this->amount,
            $this->note,
            $this->categoryId
        );

        $this->resetInputs();

        $this->emit('addedActivity');
    }

    public function showForm(string $type)
    {
        $this->type = $type;
    }

    public function chooseCategory(int $id)
    {
        $this->categoryId = $id;

        $this->saveForm();
    }

    public function resetInputs()
    {
        $this->type = null;
        $this->amount = null;
        $this->note = '';
        $this->categoryId = null;
    }
}
