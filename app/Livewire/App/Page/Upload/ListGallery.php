<?php

namespace App\Livewire\App\Page\Upload;

use App\Models\Album;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListGallery extends Component
{
    public $gallery;

    public function mount()
    {
        $this->gallery = Album::query()->where('user_id', Auth::user()->id)->get();
    }

    public function render()
    {
        return view('livewire.app.page.upload.list-gallery');
    }
}
