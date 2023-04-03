<?php

namespace App\Http\Controllers\HandymanAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('Handyman.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([    
            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::guard('handyman')->attempt($request->only('email', 'password'),false)){
            $request->session()->regenerate();
            return redirect()->intended('handyman/index')->withSuccess('تم تسجيل الدخول');
         }
        
        //dd($request);
        //$request->authenticate('handyman');

       

        return redirect()->route('handyman.login');
        //intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('handyman')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('handyman.login');
    }
}
