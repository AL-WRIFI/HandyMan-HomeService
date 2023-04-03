<?php

namespace App\Http\Controllers\Provider;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Hash;
use Session;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ProviderAuthController extends Controller
{
   // protected $guard;
    
    // public function __construct()
    // {
    //     $this->middleware('auth:handyman');
    // }
    public function login()
    {
        return view('Provider.login');
    }


    public function ProviderLogin(Request $request)
    {
        $request->validate([    
            'email' => 'required',
            'password' => 'required',
        ]);

        //$credentials = $request->only('email', 'password');

        if(Auth::guard('provider')->attempt($request->only('email', 'password'),$this->boolean('remember'))){

           return redirect()->intended('Provider.dashboard')->withSuccess('تم تسجيل الدخول');
        }

        return redirect("Providr.login")->withSuccess('هناك خطأ في البريد الالكتروني او كلمة المرور');

    }
    
    
    public function ProviderRegister(): View
    {
        $categories = Category::get('name');
        return view('Provider.register',compact('categories'));
    }
    
    public function ProviderCreate(Request $request){

        $request->validate([
            'name'=>'required',
            'phone_number'=>'required',
            'email'=>'required',
            'password'=>'required|min:6',
            'confirm_password' => 'required|same:password',
            // 'image'=>'required',
            // 'address'=>'required',
            // 'category_id'=>'required',
            // 'description'=>'required'
           ]);
           
        //    $image = $this->uploadImgae($request);
           Admin::create([
               'name'=> $request->name,
               'phone'=> $request->phone_number,
               'email'=> $request->email,
               'password'=> Hash::make($request->password),
            //    'image' => $image,
            //    'address'=>$request->address,
            //    'category_id'=>$request->category_id,
            //    'description'=>$request->description,
           ]);

           return redirect()->intended('Provider.dashboard')->withSuccess('تم تسجيل الدخول');
    }
    
    public function dashboard()
    {
        if(Auth::guard('provider')->check()){
            return view('Provider.dashboard');
        }
        return redirect("Provider.login")->withSuccess('هناك خطأ في البريد الالكتروني او كلمة المرور');
    }
    
    public function ProviderLogout(){
        Session::flush();
        Auth::guard('provider')->logout();
  
        return Redirect('Provider.login');
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