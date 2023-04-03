<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;


class UserProfile extends Component
{
    use WithFileUploads;
    public $name,$phone,$image,$image_name,$email,$order_count;
    public function mount(){
        $user = User::find(Auth::guard('web')->user()->id);
        $this->name = $user->name;
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->image = $user->image;
        $this->order_count = $user->order_count;
     
    }
    protected $rules = [

        'name' => ['required', 'string', 'max:255'],
        // 'email' => ['string', 'email', 'max:255','not_in:'.User::class],
        'phone'=>['required','not_in:'.User::class],
       ];
       protected $messages = [
   
           'name.required' => 'الاسم فارغ',
   
           'email.email' => 'البريد الاكتروني غير صحيح',
   
           'phone.required' => 'رقم الهاتف',
           
           
        ];
    public function render()
    {
        
        return view('livewire.user.user-profile')->layout('layouts.service');
    }
    public function submit(){
      // dd($this->image);
        
          //  dd($path);  
        // $path = $this->image->store('uploads', [
        //     'disk' => 'public'
        // ]);
        if ($this->image != Auth::guard('web')->user()->image) {
            // $this->image_name = md5($this->image . microtime()).'.'.$this->image->extension();
            //$this->image->storeAs('/uploads'. $this->image_name, 'public');
            $this->image_name=  $this->image->store('uploads', [
                'disk' => 'public'
            ]);
        }else{
            $this->image_name=  $this->image; 
        }
        User::where('id',Auth::guard('web')->user()->id)->update([
            'name'  => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'image' => $this->image_name,
        ]);
        $this->mount();
    }
    public function uploadPhoto(){
        $this->validate([
            'image' => 'image|max:1024', // max file size 1MB
        ]);
        if ($this->image != '') {
            $this->image_name = md5($this->image . microtime()).'.'.$this->image->extension();
            //$this->image->storeAs('/uploads'. $this->image_name, 'public');
            $this->image_name=  $this->image->store('uploads', [
                'disk' => 'public'
            ]);
        }
    // dd($this->image_name);

   //$this->photo->store('public/photos');
    // $path = $this->image->store('uploads','public');
    User::where('id',Auth::guard('web')->user()->id)->update([
        'image' => $this->image_name,
    ]);

    session()->flash('success', 'Photo uploaded successfully!');
}

}
