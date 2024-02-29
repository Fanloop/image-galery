<?php

namespace App\Livewire\App\Page\Profile;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    private const PATH_COMPONENT = 'component.';
    public User $user;
    public int $userFollower;
    public int $userFollowing;
    public string $component;
    public int $following;

    public function mount(string $userInfo)
    {
        $this->user = User::query()->findOrFail($userInfo);
        $this->setComponent('gallery');
        $this->userFollower = Follow::query()->where('user', $userInfo)->count();
        $this->userFollowing = Follow::query()->where('following_id', $userInfo)->count();
        $this->checkFollow($userInfo, Auth::user()->id);
    }

    #[On('set-component')]
    public function setComponent(string $componentName)
    {
        $this->component = self::PATH_COMPONENT . $componentName;
    }

    private function checkFollow(string $user, string $following)
    {
        $this->following = Follow::query()->where('user', $user)
            ->where('following_id', $following)
            ->count();
    }

    public function follow()
    {
        if ($this->following < 1) {
            Follow::query()->create([
                'user' => $this->user->id,
                'following_id' => Auth::user()->id,
            ]);
            $this->userFollower += 1;
        } else {
            Follow::query()
                ->where('user', $this->user->id)
                ->where('following_id', Auth::user()->id)
                ->delete();
            $this->userFollower -= 1;
        }

        $this->checkFollow($this->user->id, Auth::user()->id);
    }

    public function render()
    {
        return view('livewire.app.page.profile.index');
    }
}
