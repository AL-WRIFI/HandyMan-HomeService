<?php

namespace App\Http\Livewire\Notification;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class Caunt extends Component
{
    public $count; 
    public function render()
    {
        $this->count = Auth::user()->unreadNotifications()->count();
        return view('livewire.notification.caunt', [
            'count'=> $this->count, 
        ]);
    }
}
