<?php

namespace App\Livewire\Component;

use App\Models\Album;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Component;

class Gallery extends Component
{
    public $gallery;

    public function mount($idUser)
    {
        $this->gallery = Album::with(['foto' => function (Builder $query) {
            $query->orderBy('created_at', 'desc');
        }])->where('user_id', $idUser)->get(['id', 'nama']);
    }

    public function render()
    {
        return view('livewire.component.gallery');
    }
}
