<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class CurrencySwitcher extends Component
{
    protected $listeners = [
        'changedCurrency' => '$refresh'
    ];

    public function switch(String $currency)
    {
        $user = User::findOrFail(auth()->user()->id);

        $user->update(['currency' => $currency]);

        $this->dispatchBrowserEvent('swal:toast', [
            'icon' => 'success',
            'title' => "Changed currency to {$currency}"
        ]);

        $this->emit('changedCurrency');
    }
}
