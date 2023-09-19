<?php

namespace App\Livewire\Home;

use Livewire\Component;

class Categoriadropdown extends Component
{

    public $categorias;

    public function render()
    {
        return view('livewire.home.categoriadropdown');
    }

    public function mount($categorias)
    {
        $this->categorias = $categorias;
    }
}
