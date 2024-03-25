<?php

namespace App\Livewire\Indep;

use App\Models\Foto;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Lazy;
use Livewire\Component;

class DetailPhoto extends Component
{
    public $user;
    public $foto;
    public $previousUrl;

    public function mount(string $id)
    {
        $this->previousUrl = url()->previous();
        $this->user = Auth::user();
        $this->foto = Foto::query()->with(['like', 'user'])->find($id);
    }

    public function checkLike(string $idFoto)
    {
        return Like::query()->where('user_id', $this->user->id)
            ->where('foto_id', $idFoto)
            ->count();
    }

    public function like()
    {
        $id = $this->foto->id;
        if ($this->checkLike($id) < 1) {
            Like::query()->create([
                'user_id' => $this->user->id,
                'foto_id' => $id,
            ]);
        } else {
            Like::query()
                ->where('user_id', $this->user->id)
                ->where('foto_id', $id)
                ->delete();
        }
    }

    public function download()
    {
        return Storage::download($this->foto->path);
    }

    public function render()
    {
        return view('livewire.indep.detail-photo');
    }
}
