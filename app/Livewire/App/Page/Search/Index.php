<?php

namespace App\Livewire\App\Page\Search;

use App\Models\User;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy(false)]
class Index extends Component
{
    public string $searchUser = '';
    public $listUser;

    public function render()
    {
        if (strlen($this->searchUser) >= 1) {
            $this->listUser = User::query()->where('nama', 'like', '%' . $this->searchUser . '%')
                ->orWhere('username', 'like', '%' . $this->searchUser . '%')
                ->get(['id', 'nama', 'username', 'avatar']);
        } else {
            $this->listUser = [];
        }

        return view('livewire.app.page.search.index');
    }
}
