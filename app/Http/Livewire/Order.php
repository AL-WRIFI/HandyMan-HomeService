<?php

namespace App\Http\Livewire;

use App\Models\Service;
use App\Models\Order_ditail;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Str;
class Order extends Component
{
    
    public $services ;
    public array $quantity =[];
    public array $times = array(
      '1'=>'10:00AM',
      '2'=>'10:00AM',
      '3'=>'10:00AM',
      '4'=>'10:00AM',
      '5'=>'10:00AM',
      '6'=>'10:00AM',
    );
    public $successMessage = '';
    public $catchError = '';
    public $Steps = 1, $time, $date ,$city ,$state ,$note ,$paymentMethod ;
    public $category_id;
    
    public function mount($category_id){
        $this->services = Service::with('category:name')
        ->where('category_id',$this->category_id)->get();

        foreach($this->services as $service){
            $this->quantity[$service->id] =1;
        }

        $this->category_id = $category_id;       
    }
    
    public function render()
    { 
        $cart =Cart::content();
        //dd($cart);
        return view('livewire.order' ,[
            'cart'=> $cart
        ])->layout('layouts.service');
    }
    public function addToCart(Service $service){

        //$service = Service::findOrFail($service_id);
     
        Cart::add([
           'id'=> $service->id,
           'name'=> $service->name,
           'qty' => $this->quantity[$service->id],
           'price' => $service->price / 100 ,
           'weight' => 550,
           'options' => ['size' => 'large'],
            
        ]);
        $this->emit('cart_updated');
    }
    public function removeFromCart($id){
        //Cart::remove($id);
        $cart = Cart::content()->where('id',$id);
        Cart::remove($cart->value('rowId'));

        //$cart->value('rowId');

        //$cv=$var->rowId;
        //$var = $cart['rowId'];
        //Cart::remove()->where('id',$id);
        //dd($var);
       // Cart::remove($id);
        //dd($cart);
    //    if($cart->isNotEmpty()){
    //        Cart::remove($cart);
    //    }
       $this->emit('cart_updated');
    }

    public function increment($service_id)
    {
        $this->quantity[$service_id] ++;
         
    }

    public function decrease($service_id)
    {
        $this->quantity[$service_id] --;
    }

    public function fristStepSubmit(){
        $this->Steps = 2;
    }
    public function secondStepSubmit(){
        $this->Steps =3;
    }
    public function back(){
        $this->Steps --;
    }
    
    public function cereatOrder(){
        
    }
    

    public function time_select(){
        $datea= $this-> date ;
        $times= $this-> time ;
        $ctiys= $this-> city;
        $states= $this-> state;
        $notes= $this-> note; 
        $cart =Cart::content();

        dd($datea,$times,$ctiys,$states,$notes,$cart);
    
    }
}
