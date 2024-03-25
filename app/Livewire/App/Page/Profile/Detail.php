<?php

namespace App\Livewire\App\Page\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Detail extends Component
{
    use WithFileUploads;

    public $userId;
    public $avatarProfile;

    #[Rule(['required', 'image', 'mimes:jpeg,png,jpg', 'max:3072'])]
    public $avatar;

    #[Rule(['required', 'max:100', 'alpha'], as: 'name')]
    public $nama;

    #[Rule(['required', 'min:3', 'unique:users,username', 'max:30'])]
    public $username;

    #[Rule(['max:100'], as: 'address')]
    public $alamat;

    #[Rule(['max:250'])]
    public $bio;

    public function mount()
    {
        $user = Auth::user();
        $this->userId = $user->id;
        $this->avatarProfile = $user->avatar;
        $this->nama = $user->nama;
        $this->username = $user->username;
        $this->alamat = $user->alamat;
        $this->bio = $user->bio;
    }

    public function avatarUpdate()
    {
        $result = $this->avatar->storeAs(path: $this->userId, name: 'avatar.png');
        User::query()->where('id', $this->userId)->update([
            'avatar' => $result,
        ]);
        return redirect()->route('profile.user');
    }

    public function update()
    {
        User::query()->where('id', $this->userId)->update([
            'nama' => $this->nama,
            'username' => $this->username,
            'alamat' => $this->alamat,
            'bio' => $this->bio,
        ]);
        return redirect()->route('profile.user');
    }

    public function render()
    {
        return view('livewire.app.page.profile.detail');
    }
}
