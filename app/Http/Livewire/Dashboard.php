<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Item;


class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard',[
            'title' => 'Dashboard',
        ]);
    }
}
