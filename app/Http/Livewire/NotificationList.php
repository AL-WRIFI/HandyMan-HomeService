<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NotificationList extends Component
{
    protected $listeners = ['notification' => 'render'];
    public function render()
    {
        return view('livewire.notification-list');
    }
}
