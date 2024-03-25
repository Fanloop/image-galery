<?php

namespace App\Livewire\Indep;

use App\Models\Album;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule as ValidationRule;
use Livewire\Component;
use Livewire\Livewire;

class Edit extends Component
{
    public $user;
    public $gallery;

    public $nama;
    public $deskripsi;

    public function mount($idGallery)
    {
        $user = Auth::user();

        $this->gallery = Album::query()->where('id', $idGallery)->where('user_id', $user->id)->first();
        $this->user = $user;
        $this->nama = $this->gallery->nama;
        $this->deskripsi = $this->gallery->deskripsi;
    }

    protected function rules()
    {

        return [
            'nama' => [
                'required', 'max:25',
                ValidationRule::unique('album')->where(function ($query) {
                    return $query->where('user_id', Auth::id());
                })->ignore($this->gallery->id, 'id'),
            ],
            'deskripsi' => ['nullable', 'max:100'],
        ];
    }

    public function update()
    {
        $this->validate();

        $update = Album::query()->where('user_id', $this->user->id)->where('nama', $this->gallery->nama)->update([
            'nama' => $this->nama,
            'deskripsi' => $this->deskripsi
        ]);

        $album = Album::query()
            ->where('user_id', $this->user->id)
            ->where('nama', $this->nama)
            ->first();

        return redirect()->route('gallery', ['idGallery' => $album->id]);
    }

    public function delete()
    {
        $result = Album::query()->where('user_id', $this->user->id)->where('nama', $this->gallery->nama)->delete();
        if ($result > 0) {
            Storage::deleteDirectory("{$this->user->id}/{$this->gallery->id}");
        }
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.indep.edit');
    }
}
