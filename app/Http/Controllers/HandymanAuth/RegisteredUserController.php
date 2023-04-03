<?php

namespace App\Http\Controllers\HandymanAuth;

use App\Http\Controllers\Controller;
use App\Models\Handyman;
use App\Models\City;
use App\Models\Zone;
use App\Models\Category;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;


class RegisteredUserController extends Controller
{
    public function create(): View
    {
        $cities = City::get();
        $zones = Zone::get();
        $categories = Category::get();
        return view('Handyman.register',compact('categories','cities','zones'));
    }
    public function store(Request $request)
    {

        
       $request->validate([
         'name' => ['required', 'string', 'max:255'],
         'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Handyman::class],
         'password' => ['required', Rules\Password::defaults()],
         'phone'=>['required','unique:'.Handyman::class],
         'confirm_password' => 'required|same:password',
         'image'=>'required',
         'city_id'=>'required',
         'zone_id'=>'required',
         'address_note'=>'required',
         'category_id'=>'required',
         'description'=>'required'
        ]);

        
        if(!$request->hasFile('image')){
            $path = 'uploads/user2.png';
        }else{
            $file =$request->file('image');

            $path = $file->store('uploads', [
                'disk' => 'public'
            ]);
        }
       
    
        // $image = $this->uploadImgae($request);
        $handyman = Handyman::create([
            'name'=> $request->name,
            'phone'=> $request->phone,
            'email'=> $request->email,
            'password'=>Hash::make($request->password),
            'image' => $path,
            'category_id'=>$request->category_id,
            'city_id'=> $request->city_id,
            'zone_id'=>$request->zone_id,
            'address_note'=>$request->address_note,
            'description'=>$request->description,
        ]);

        // event(new Registered($user));

        Auth::guard('handyman')->login($handyman);

        return redirect()->route('handyman.index');
    }
    protected function uploadImgae(Request $request){
     
        if(!$request->hasFile('image')){
            return;
        }
        $file =$request->file('image');

        $path = $file->store('uploads', [
            'disk' => 'public'
        ]);
        return $path;
    }
}
