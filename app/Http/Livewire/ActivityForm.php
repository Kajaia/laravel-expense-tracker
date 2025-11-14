<?php

namespace App\Http\Livewire;

use App\Http\Requests\ActivityRequest;
use App\Services\ActivityService;
use App\Services\CategoryService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class ActivityForm extends Component
{
    public $amount;
    public $note;
    public $category_id;

    public function getSubtractCategoriesProperty(
        CategoryService $categoryService
    ): Collection
    {
        return $categoryService->getSubtractCategories();
    }

    public function getAddCategoriesProperty(
        CategoryService $categoryService
    ): Collection
    {
        return $categoryService->getAddCategories();
    }

    public function saveForm()
    {
        $this->validate((new ActivityRequest)->rules());
        
        $categoryService = app(CategoryService::class);

        $category = $categoryService->getCategoryById($this->category_id);

        if($category->type === 'subtract') {
            if($this->balance() >= $this->amount) {
                Cache::forget('balance_'.Auth::user()->id);

                $this->addActivityAndFireEvent();

                $this->dispatchBrowserEvent('swal:toast', [
                    'icon' => 'success',
                    'title' => 'Subtracted money from your balance'
                ]);
            } else {
                $this->dispatchBrowserEvent('swal:toast', [
                    'icon' => 'warning',
                    'title' => 'Can\'t go below your balance'
                ]);
            }
        } elseif($category->type === 'add') {
            Cache::forget('balance_'.Auth::user()->id, $this->amount);

            $this->addActivityAndFireEvent();

            $this->dispatchBrowserEvent('swal:toast', [
                'icon' => 'success',
                'title' => 'Added money to your balance'
            ]);
        }


    }

    public function addActivityAndFireEvent()
    {
        $activityService = app(ActivityService::class);

        $activityService->addActivity(
            $this->amount,
            $this->note,
            $this->category_id
        );

        $this->resetInputs();

        $this->emit('addedActivity');
    }

    public function chooseCategory(int $id)
    {
        $this->category_id = $id;

        $this->saveForm();
    }

    public function resetInputs()
    {
        $this->amount = null;
        $this->note = null;
        $this->category_id = null;
    }

    public function balance(): float
    {
        $activityService = app(ActivityService::class);

        return $activityService->getBalance();
    }
}
