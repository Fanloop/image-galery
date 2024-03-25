<?php

namespace App\Livewire\Indep;

use App\Models\Album;
use Illuminate\Validation\Rule as ValidationRule;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Gallery extends Component
{
    public $user;
    public $gallery;

    public function mount($idGallery)
    {
        $user = Auth::user();
        $gallery = Album::query()->with('foto')->find($idGallery);

        $this->user = $user;
        $this->gallery = $gallery;
    }

    public function render()
    {
        return view('livewire.indep.gallery');
    }
}
