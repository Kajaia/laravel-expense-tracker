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
    public $category_id;

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

        if($this->type === 'subtract') {
            if($this->balance() >= $this->amount) {
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
        } elseif($this->type === 'add') {
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

    public function showForm(string $type)
    {
        $this->type = $type;
    }

    public function hideForm()
    {
        $this->type = null;
    }

    public function chooseCategory(int $id)
    {
        $this->category_id = $id;

        $this->saveForm();
    }

    public function resetInputs()
    {
        $this->hideForm();
        $this->amount = null;
        $this->note = '';
        $this->category_id = null;
    }

    public function balance(): int
    {
        $activityService = app(ActivityService::class);

        return $activityService->getBalance();
    }
}
