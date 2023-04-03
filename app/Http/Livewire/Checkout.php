<?php

namespace App\Http\Livewire;
use App\Events\OrderCreated;
use App\Models\Service;
use App\models\Handyman;
use App\models\User;
use App\models\Order;
use App\models\City;
use App\models\Order_image;
use App\models\Zone;
use App\Models\Order_ditail;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use \Carbon\Carbon;
use App\Events\NewNotification;
use Illuminate\Support\Facades\Event;
class Checkout extends Component
{
    //use Cart;
    use WithFileUploads;
    public $services ,$handymans,$handyman,$barLength = 0 ,$pro=null ;
    public array $provid=[]; 
    public array $quantity =[];
    public $successMessage = '';
    public $catchError = '';
    public $Steps = 1,$selectedTimeSlot, $date ,$city ,$zone ,$note,$photo,$paymentMethod ,$image;
    public $category_id ,$previous_url;

    public $timeSlots = [
        '9:00am', '10:00am', '11:00am', '12:00pm', '1:00pm', '2:00pm', '3:00pm', '4:00pm', '5:00pm'
    ];
    // protected $rules = [

    //     'date' => 'required|min:6',

    //     'selectedTimeSlot' => 'required|email',
    //     'city' => 'required|min:6',

    //     'zone' => 'required|email',
    //     'date' => 'required|min:6',

    //     'selectedTimeSlot' => 'required|email',
    //     'date' => 'required|min:6',

    //     'selectedTimeSlot' => 'required|email',

    // ];
    public function mount($category_id){  

        $this->services = Service::with('category:name')->where(['category_id' => $this->category_id,'status' => 1 ])->get();
        $this->handymans = Handyman::where(['category_id' => $this->category_id,'accepted' => 1])->get();
        foreach($this->handymans as $handyman){
            $this->provid[$handyman->id]= $handyman->id;     
        }
        foreach($this->services as $service){
            $this->quantity[$service->id] = 1;  
        }
        $this->category_id = $category_id; 
       
    } 
    public function render()
    { 
        
    //$this->previous_url = url()->current();
    //dd( $this->previous_url);
        $cart = Cart::content();
        $cities = City::all();
        $zones = Zone::all();
        return view ('livewire.checkout' ,['cart'=> $cart ,'zones' => $zones ,'cities'=> $cities, ])->layout('layouts.service');
    }
    public function addToCart(Service $service){
        Cart::add([
           'id'=> $service->id,
           'name'=> $service->name,
           'qty' => $this->quantity[$service->id],
           'price' => $service->price,
           'weight' => 550,
           'options' => ['size' => 'large'],
            
        ]);
        $this->emit('cart_updated');
        // $this->mount($this->category_id);
    }
    public function removeFromCart($id){
        $cart = Cart::content()->where('id',$id);
        Cart::remove($cart->value('rowId'));
        $this->emit('cart_updated');
        // $this->mount($this->category_id);
    }
    public function clearCart()
    {
        Cart::clear();
        session()->flash('success', 'All Item Cart Clear Successfully !');
    }

    public function increment($service_id)
    {
        $this->quantity[$service_id] ++;
        if($this->quantity[$service_id] > 8 ){
            $this->quantity[$service_id] = 8;
        }  
        $cart= Cart::content()->where('id',$service_id);
        $rowId = $cart->value('rowId');
        if($rowId){   
        Cart::update($cart->value('rowId'),$this->quantity[$service_id]);  
        }

    }
    public function decrease($service_id)
    {
        $this->quantity[$service_id] --;
        if($this->quantity[$service_id] < 1 ){
            $this->quantity[$service_id] =1;}
        $cart = Cart::content()->where('id',$service_id);
        $rowId = $cart->value('rowId');
        if($rowId){   
         Cart::update($cart->value('rowId'),$this->quantity[$service_id]);  
        }
    }
    public function login(){
        session()->put('previous_url', url()->previous());
        return  redirect()->route('login');
    }
   
    // public function Next()
    // {
    //     $this->Steps++;
    //      if($this->Steps >= 4)
    //      {
    //          $this->Steps = 4;
    //      }
    //     $this->barLength = (($this->Steps - 1) / (4 - 1)) * 100;
    // }
    // public function Previous()
    // {
    //     $this->Steps--;
    //     if($this->Steps < 1)
    //     {
    //         $this->Steps = 1;
    //     }
    //     $this->barLength = (($this->Steps - 1) / (4 - 1)) * 100;
    // }
    public function SelectProvider($id){
      $this->pro =$this->provid[$id];
    }
    public function UnSelectProvider($id){
        $this->pro =null;
    }
    
    public function createOrder(){
        $this->validate([
            'date' => 'required',
            'selectedTimeSlot' => 'required',
            'pro' => 'required',

        ]);
        // $path = $this->image->store('uploads',[
        //     'disk' => 'public']);
        
        $cart = Cart::content();
        $totalCost = str_replace(',', '', Cart::subtotal());
        //  dd($totalCost);
        $order = Order::create([
          'user_id'=> Auth::guard('web')->user()->id,
          'category_id'=> $this->category_id,
          'handyman_id'=> $this->pro,
          'note'=> $this->note,
          'city_id'=> $this->city,
          'zone_id' => $this->zone,
          'dateTimeService'=> Carbon::createFromFormat('Y-m-d H:i A', $this->date . ' ' . $this->selectedTimeSlot), 
          'total_cost'=> $totalCost,
        ]);
        // Order_image::create([
        //     'order_id' => $order->id,
        //     'image' =>$path,
        // ]);
        foreach($cart as $itmes){
        Order_ditail::create([
            'order_id'=> $order->id,
            'service_id'=> $itmes->id,
            'service_cost'=> $itmes->price,
            'quantity'=> $itmes->qty,
        ]);
        }
        // $recipientId = $this->pro;
        // Event::dispatch(new NewNotification($order));
        // /event(new NewNotification($order->id, $recipientId));
        //Cart::cleer();
        // event(new OrderCreated($order));
        //session()->flash('success', 'تم ارسال الطلب');
        return redirect()->route('user-order');
    }
   
    
    
    public function fristStepSubmit(){
        $this->Steps= 2;
        $this->barLength = (($this->Steps - 1) / (4 - 1)) * 100;
    }
    public function secondStepSubmit(){
        $this->validate([
            'date' => 'required',
            'selectedTimeSlot' => 'required',
        ]);
        $this->Steps=3;
        $this->barLength = (($this->Steps - 1) / (4 - 1)) * 100;
    }
    public function thridStepSubmit(){
        $this->validate([
            'city' => 'required',
            'zone' => 'required',
        ]);
        $this->Steps= 4;
        $this->barLength = (($this->Steps - 1) / (4 - 1)) * 100;
    }
    public function fourthStepSubmit(){
        $this->Steps= 4;
        $this->barLength = (($this->Steps - 1) / (4 - 1)) * 100;
    }
    public function handymanStepSubmit($id){
       // dd($id);
        $this->Steps= 5;
        $this->handyman = Handyman::find($id);
        $this->render();
    }
    public function back(){
        $this->Steps --;
        $this->barLength = (($this->Steps - 1) / (4 - 1)) * 100;
    }
}
