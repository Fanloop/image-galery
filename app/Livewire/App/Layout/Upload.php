<?php

namespace App\Livewire\App\Layout;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Upload')]
class Upload extends Component
{
    private const PATH = 'app.page.upload.';
    public $user;
    public $component;

    public function mount()
    {
        $this->user = Auth::user();
        $this->setComponent();
    }

    public function setComponent(string $component = 'index')
    {
        $this->component = self::PATH . $component;
    }

    public function render()
    {
        return view('livewire.app.layout.upload');
    }
}
