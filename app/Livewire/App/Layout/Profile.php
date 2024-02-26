<?php

namespace App\Livewire\App\Layout;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Profile')]
class Profile extends Component
{
    private const PATH_COMPONENT = 'app.page.profile';
    public $user;
    public $current;
    public $userInfo;

    public function mount($id = null)
    {
        $this->setComponent();
        $this->user = Auth::user();
        $this->userInfo = $id ?? Auth::user()->id;
    }

    public function setComponent(string $componentName = 'index')
    {
        $this->current = self::PATH_COMPONENT . "." . $componentName;
    }

    public function render()
    {
        return view('livewire.app.layout.profile');
    }
}
