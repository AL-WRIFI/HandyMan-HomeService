<?php

namespace App\Http\Livewire\Handyman;

use Livewire\Component;
use App\Models\Handyman;
use App\Models\City;
use App\Models\Zone;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
//use Illuminate\Support\Facades\Storage;
use App\Models\HandymanPreviousWorks;

class HandymanProfile extends Component
{
    use WithFileUploads;
    public $name,$phone,$image,$address_note,$email,$category_name 
    ,$AvgRating,$ratingCount ,$zone_id,$city_id,$description, $photos = [] ,$hanymanPreviousWorke;
    protected $rules = [

        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255','not_in:'.Handyman::class],
        'phone'=>['required','not_in:'.Handyman::class],
        'address_note'=>'required',
        //'image'=>'required',
        'city_id'=>'required',
        'zone_id'=>'required',
        'description'=>'required',
       

    ];
    protected $messages = [

        'email.required' => 'البريد الاكتروني فارغ',

        'email.email' => 'البريد الاكتروني غير صحيح',

    ];
    public function mount(){
     
        $handyman = Handyman::find(Auth::guard('handyman')->user()->id);
        $this->name = $handyman->name;
        $this->phone = $handyman->phone;
        $this->email = $handyman->email;
        $this->address_note = $handyman->address_note;
        $this->image = $handyman->image;
        $this->category_name = $handyman->category->name;
        $this->zone_id =$handyman->zone_id;
        $this->city_id =$handyman->city_id;
        $this->description =$handyman->description;
        $this->AvgRating = $handyman->AvgRating();
        $this->ratingCount = $handyman->ratingCount();
        $this->hanymanPreviousWorke = $handyman->previousWorks;
    }
    public function render()
    {
        $cities = City::all();
        $zones = Zone::all();
        return view('livewire.handyman.handyman-profile',['cities'=>$cities,'zones'=>$zones])->layout('layouts.handyman');
    }
    public function submit(){
        $this->validate();
        if ($this->image != Auth::guard('web')->user()->image || $this->image != '') {
            $path = $this->image->store('uploads',[
                'disk' => 'public']);
        }
       
        Handyman::where('id',Auth::guard('handyman')->user()->id)->update([
            'name'  => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'address_note' => $this->address_note,
            'image' => $path,
            'city_id' => $this->city_id,
            'zone_id' =>  $this->zone_id,
            'description' =>  $this->description,
        ]);
        $this->mount();

    }

    public function uploadImgae(){

        $this->validate([
            'photos.*' => 'image|max:1024', // 1MB Max
        ]);
        foreach($this->photos as $photo){
        $path = $photo->store('uploads', [
            'disk' => 'public'
        ]);

        HandymanPreviousWorks::create([
            'handyman_id' => Auth::guard('handyman')->user()->id,
            'image' => $path,
          ]);
        }
        $this->mount();
    }
}
