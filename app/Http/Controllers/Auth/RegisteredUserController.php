<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
  
    /**
     * Display the registration view.
     */
    public function create(Request $request): View
    {
        $next = request('next');
        
        return view('auth.register',compact('next'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'image'=> 'uploads/default_user_image.png',
        ]);

        event(new Registered($user));

        Auth::login($user);
        if ($request->has('next')) {
            return redirect($request->input('next'));
        }
        return redirect()->intended('home');
    
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
