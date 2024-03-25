<?php

namespace App\Livewire\Component;

use App\Models\Like;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy(isolate: false)]
class ListPhoto extends Component
{
    public $likes;
    public function mount(string $idUser)
    {
        $this->likes = Like::query()->with('foto')->where('user_id', $idUser)->latest()->get();
    }

    public function render()
    {
        return view('livewire.component.list-photo');
    }
}
