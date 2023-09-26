<?php

namespace App\Livewire\Home;
use Livewire\Attributes\On;

use Livewire\Component;

class Alert extends Component
{
    public $show = FALSE;
    public $msg = "";
    public $type = "";

    public function render()
    {
        return view('livewire.home.alert');
    }

    #[On('alertProduct')]
    public function alertAdded($msg, $type)
    {
        $this->show = TRUE;
        $this->msg = $msg;
        $this->type = $type;
        $this->render();
    }

}
