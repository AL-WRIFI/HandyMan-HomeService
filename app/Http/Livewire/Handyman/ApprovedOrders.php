<?php

namespace App\Http\Livewire\Handyman;

use App\Models\Order;
use App\Models\Handyman;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use \Carbon\Carbon;
class ApprovedOrders extends Component
{

    public function mount(){

        
        //  foreach($this->approvedOrders as $approvedOrder){ 
        //  $this->orderDateTime[$approvedOrder->id] = Carbon::createFromFormat('Y-m-d H:i:s', $approvedOrder->dateTimeService);  
        //  $this->orderDateTime[$approvedOrder->id] = $approvedOrder->dateTimeService->format('Y-m-d H:i:s ');
        //  }
        //$this->orderDateTime = \Carbon\Carbon::parse(" $approvedOrder->service_date  $approvedOrder->service_time");
            //$this->orderDate[$approvedOrder->id] = $approvedOrder->service_date;
         //$this->orderTime[$approvedOrder->id] = Carbon::parse($approvedOrder->dateTimeService );
         

    }
    public function render()
    {
        $approvedOrders = Order::where(['status'=>'accepted','handyman_id'=>Auth::guard('handyman')->user()->id])->orwhere('status','ongoing')->get();
        return view('livewire.handyman.approved-orders',['approvedOrders'=>$approvedOrders])->layout('layouts.handyman');
    }
    public function ongoingOrder($orderId){
        Order::where('id',$orderId)->update([
            'status' => 'ongoing',
           ]);
           //$this->order_stat = $orderId;
          // $this->emit('OrderStatusupdated', $orderId);
    }
    public function completedOrder($orderId){ 
        Order::where('id',$orderId)->update([
            'status' => 'completed',
           ]);
        Handyman::where('id',Auth::guard('handyman')->user()->id)->increment('order_count');
        Handyman::where('id',)->increment('order_count');
        // $handyman = Handyman::find(Auth::guard('handyman')->user()->id); 
        // $handyman->order_count++; 
        // $handyman->save(); 


    }
}
