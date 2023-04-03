<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\models\Order;
use App\models\Handyman;
use App\models\Rating;
use Illuminate\Support\Facades\Auth;

class CompletedOrder extends Component
{
    
    public $rating, $existingRating=[],$orders,$review;
    public function mount()
    {
        $this->orders = Order::where(['status' =>'completed','user_id'=>Auth::guard('web')->user()->id])->get();
        foreach($this->orders as $order){
            if(Rating::where('order_id', $order->id)->exists()){
                $this->existingRating[$order->id] = true;
            }else{
                $this->existingRating[$order->id] = false;
            }
        }
    }


    public function render()
    {
        if(Auth::check()){       
        return view('livewire.user.completed-order',['orders'=> $this->orders, ])->layout('layouts.service');
        }
        return view('livewire.user.completed-order')->layout('layouts.service');

       
    }

    public function sendRating( $handymanID ,$orderId){
    // dd($handymanID ,$orderId);
       Rating::create([
        'user_id'    => Auth::guard('web')->user()->id,
        'handyman_id'=> $handymanID,
        'order_id'   => $orderId,
        'rating'     => $this->rating,
        'review'     => $this->review,   
       ]);

     
    $this->dispatchBrowserEvent('Rating', [
        'title' => 'Item deleted!',
        'text' => 'The item has been deleted successfully.',
        'icon' => 'success',
    ]);
    session()->flash('message', 'تم ارسال التقييم.'); 
    $this->mount();

        //return alrt('jhvbyihvbliubuib');
       //$this->dispatchBrowserEvent('swal', ['title' => 'hello from Livewire']);

    }
}
