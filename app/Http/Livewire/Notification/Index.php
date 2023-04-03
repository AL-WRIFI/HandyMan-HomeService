<?php

namespace App\Http\Livewire\Notification;

use Livewire\Component;
use App\models\Order;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $orders , $user ;

    protected $listeners = ['notificationOrder' => 'addNotification'];
    public function mount()
    {
        // $this->listeners['notificationOrder'] = 'addNotification';

    }
    public function render()
    {
        return view('livewire.notification.index');
    }
    public function addNotification($orderId){
    //    $ordert = $orderId['orderId'];
    //     dd($ordert);        
        $this->orders = Order::where(['id'=>$orderId['orderId'],'handyman_id' => Auth::guard('handyman')->user()->id])->get();
        
        // dd($this->order);
    }
}
