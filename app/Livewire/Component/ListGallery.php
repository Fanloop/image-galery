<?php

namespace App\Livewire\Component;

use App\Models\Album;
use Livewire\Attributes\Modelable;
use Livewire\Component;

class ListGallery extends Component
{
    #[Modelable]
    public string $search;

    public $gallery = [];
    public $id;

    public function render()
    {
        if ($this->search >= 1) {
            $this->gallery = Album::query()->where('nama', 'LIKE', "%{$this->search}%")->where('user_id', $this->id)->get();
        } else {
            $this->gallery = [];
        }

        return view('livewire.component.list-gallery');
    }
}
