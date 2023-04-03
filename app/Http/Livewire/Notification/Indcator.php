<?php

namespace App\Http\Livewire\Notification;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Indcator extends Component
{
    public $hasNotification; 
    public function render()
    {
        $this->hasNotification = $this->setHasNotifications(Auth::user()->unreadNotifications()->count());
        return view('livewire.notification.indcator',[
            'hasNotification' => $this->hasNotification,
        ]);
    }

    public function setHasNotifications(int $count ){

        return $count > 0;
    }
}
