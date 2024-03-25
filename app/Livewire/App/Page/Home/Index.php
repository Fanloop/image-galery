<?php

namespace App\Livewire\App\Page\Home;

use App\Models\Foto;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy(isolate: false)]
class Index extends Component
{
    public $image;

    public function mount()
    {
        $this->image = Foto::query()->with(['like', 'user'])->orderBy('created_at', 'desc')->get();
    }

    public function checkLike(string $idFoto)
    {
        return Like::query()->where('user_id', Auth::user()->id)
            ->where('foto_id', $idFoto)
            ->count();
    }

    public function like(string $idFoto)
    {
        $idUser = Auth::user()->id;

        if ($this->checkLike($idFoto) < 1) {
            Like::query()->create([
                'user_id' => $idUser,
                'foto_id' => $idFoto,
            ]);
        } else {
            Like::query()
                ->where('user_id', $idUser)
                ->where('foto_id', $idFoto)
                ->delete();
        }
    }

    public function download($path)
    {
        return Storage::download($path);
    }

    public function render()
    {
        return view('livewire.app.page.home.index');
    }
}
