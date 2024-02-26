<?php

namespace App\Livewire\App\Page\Profile;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Detail extends Component
{
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.app.page.profile.detail');
    }
}
