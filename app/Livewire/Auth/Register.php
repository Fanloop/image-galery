<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('register')]
class Register extends Component
{
    #[Layout('layouts.auth')]
    public function render()
    {
        return view('livewire.auth.register');
    }
}
