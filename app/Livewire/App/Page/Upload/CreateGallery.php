<?php

namespace App\Livewire\App\Page\Upload;

use App\Models\Album;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule as ValidationRule;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreateGallery extends Component
{
    public $nama;
    public $deskripsi;

    protected function rules()
    {
        return [
            'nama' => [
                'required', 'max:25',
                ValidationRule::unique('album')->where(function ($query) {
                    return $query->where('user_id', Auth::id());
                }),
            ],
            'deskripsi' => ['nullable', 'max:100'],
        ];
    }

    public function create()
    {
        $this->validate();

        $user = Auth::user();
        $album = Album::create([
            'nama' => $this->nama,
            'deskripsi' => $this->deskripsi,
            'user_id' => $user->id,
        ]);

        if ($album) {
            Storage::makeDirectory("{$user->id}/{$album->id}");
        }

        return redirect()->route('upload');
    }

    public function render()
    {
        return view('livewire.app.page.upload.create-gallery');
    }
}
