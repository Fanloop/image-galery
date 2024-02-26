<?php

namespace App\Livewire\App\Page\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $user;

    public function mount($userInfo)
    {
        $this->user = User::query()->findOrFail($userInfo);
    }

    public function render()
    {
        return view('livewire.app.page.profile.index');
    }
}
