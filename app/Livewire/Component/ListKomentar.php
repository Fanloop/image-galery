<?php

namespace App\Livewire\Component;

use App\Models\Komentar;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListKomentar extends Component
{
    public $komentar;
    public $idFoto;
    public $listKomen;
    public $user;

    public function mount($id)
    {
        $this->user = Auth::user();
        $this->idFoto = $id;
        $this->listKomen = Komentar::query()->with('user')->where('foto_id', $id)->latest()->get();
    }

    public function sendCommend()
    {
        $result = Komentar::query()->create([
            'komentar' => $this->komentar,
            'user_id' => $this->user->id,
            'foto_id' => $this->idFoto
        ]);

        if ($result) {
            $this->komentar = '';
            $this->listKomen->prepend($result);
        }
    }

    public function render()
    {
        return view('livewire.component.list-komentar');
    }
}
