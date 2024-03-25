<?php

namespace App\Livewire\Indep;

use App\Models\Album;
use App\Models\Foto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddPhoto extends Component
{
    use WithFileUploads;

    public $user;
    public $album;

    #[Rule(['required', 'image', 'mimes:jpeg,png,jpg', 'max:3072'])]
    public $image;

    #[Rule(['required', 'max:150'], as: 'title')]
    public $judul = '';

    #[Rule(['max:250'], as: 'description')]
    public $deskripsi = '';

    public function mount(string $idGallery)
    {
        $this->user = Auth::user();
        $this->album = Album::query()->find($idGallery);
    }

    public function save()
    {
        $this->validate();

        $image = $this->image->store(path: "{$this->user->id}/{$this->album->id}");
        Foto::query()->create([
            'judul' => $this->judul,
            'deskripsi' => $this->deskripsi,
            'path' => $image,
            'user_id' => $this->user->id,
            'album_id' => $this->album->id,
        ]);

        return redirect()->route('gallery', ['idGallery' => $this->album->id]);
    }

    public function render()
    {
        return view('livewire.indep.add-photo');
    }
}
