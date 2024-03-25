<?php

namespace App\Livewire\Component;

use App\Models\User;
use Livewire\Component;

class Recomend extends Component
{
    public $allUser;

    public function mount()
    {
        $this->allUser = User::query()->latest()->take(10)->get();
    }

    public function render()
    {
        return view('livewire.component.recomend');
    }
}
