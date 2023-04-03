<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\models\Order;
use App\models\User;
use App\models\Service;
use App\models\Order_ditail;
use Illuminate\Support\Facades\Auth;

class UserOrder extends Component
{

    public $user ,$orders,$status=[];
   
    protected $listeners = ['orderApproved' => 'orderacc'];
    public function orderacc($data){
        dd($data);
        session()->flash('message', 'تم قبول الطلب .'); 
        $this->mount();
    }
    
    public function mount()
    {
        $this->orders = Order::where('user_id',Auth::guard('web')->user()->id)->get();
        foreach($this->orders as $order){
            $this->status[$order->id] = $order->status;
        }
        // $this->status = getStatusFromDatabase(); // استعلام قاعدة البيانات للتحقق من تغيير قيمة الحالة
        $this->emit('refresh');
    // $this->emitSelf('refreshComponent'); // استدعاء الحدث refreshComponent لإعادة تحميل المكون
    } 
    //protected $listeners = ['orderApproved' => 'updateOrders'];
    //protected $listeners = ['OrderStatusupdated' => 'acscepted'] ;
    public function render()
    {
        // $this->user = User::find(Auth::guard('web')->user()->id);
        // $this->orders = $this->user->orders;  
         if(Auth::check()){
         $this->orders = Order::where('user_id',Auth::guard('web')->user()->id)->get();
         return view('livewire.user-order',[
            'orders'=> $this->orders, ])->layout('layouts.service');
         }
         return view('livewire.user-order')->layout('layouts.service');
        
         
    }
    public function updateOrders()
    {
        
    }

    // public function getListeners()
    // {
    //     return [
    //         'orderApproved' => 'refreshOrders',
    //     ];
    // }

//     public function mount()
// {
//     $this->listen('myEvent', 'handleMyEvent');
// }

// public function handleMyEvent($data)
// {
//     // Handle the event data
// }

}
