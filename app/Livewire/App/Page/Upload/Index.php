<?php

namespace App\Livewire\App\Page\Upload;

use Livewire\Component;

class Index extends Component
{
    public $search = '';
    public $id;

    public function render()
    {
        return view('livewire.app.page.upload.index');
    }
}
