<?php

namespace App\Livewire\App\Layout;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('search-profile')]
class Search extends Component
{
    public $user;
    public $listUser;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.app.layout.search');
    }
}
