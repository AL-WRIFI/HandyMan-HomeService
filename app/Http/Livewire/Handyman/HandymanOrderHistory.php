<?php

namespace App\Http\Livewire\Handyman;

use Livewire\Component;
use App\models\Order;
use Illuminate\Support\Facades\Auth;

class HandymanOrderHistory extends Component
{
    public function render()
    {
        $orders = Order::where(['handyman_id'=>Auth::guard('handyman')->user()->id])->whereIn('status', ['completed','rejected'])->get();
        return view('livewire.handyman.handyman-order-history',['orders'=>$orders])->layout('layouts.handyman');
    }
}
