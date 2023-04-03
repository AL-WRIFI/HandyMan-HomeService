<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- jQuery library -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  <!-- Bootstrap JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  <title>loin</title>
  <style>
    .card {
      margin-top: 2rem;
    }

    .content-divider-span:before {
      content: "";
      position: absolute;
      top: 50%;
      right: 0;
      height: 1px;
      background-color: #ddd;
      width: 100%;
      z-index: -1;
    }
  </style>
</head>

<body>


  <div class="container" style="text-align: end;">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card" style="
      border: 0;
      border-radius: 2px;
      box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
  ">
          <div class="card-header" style="
      background-color: #f3fffc;
      border: 0;
  ">
            <ul class="nav nav-pills card-header-pills" role="tablist"
              style="direction: rtl;justify-content: space-between;margin: 0;padding: 0;">
              <li class="nav-item" style="
      margin: 0;
      padding: 0;
  ">
                <a class="nav-link active show"  href="{{  route('login') }}" role="tab" style="
      border: 0;
      background-color: #f3fffc;
      margin: 0px 15px;
  " aria-selected="true">
                  <h5 style="
      font-size: 14px;
      color: #59524c;
      margin: 0;
  ">تسجيل الدخول</h5>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link"   href="{{ route('register') }}" role="tab" style="
      border: 0;
      background-color: #f3fffc;
      color: #59524c;
  " aria-selected="false">
                  <h5 style="
      font-size: 14px;
      margin: 0 7px;
  ">انشاء حساب</h5>
                </a>
              </li>
            </ul>
          </div>
          <div class="card-body">

            <div class="tab-content" style="padding: 0 20px;">
            
             

                             
<div class="tab-pane active show" id="login" role="tabpanel" style="
padding: 20px;
">
          <div class="text-center">
            <h5 class="content-group" style="margin: 0 0 20px 0;">تسجيل الدخول</h5>
          </div>
          @php
          $previousUrl = session()->get('previous_url');
          if($previousUrl){
              
          }else{
            $previousUr =session()->put('previous_url','/home');
          }
          @endphp
         
          <form action="{{route('login') }}" method="POST">
            @csrf
            <input type="hidden" name="previous_url" value="{{ session('previous_url') }}">
            <div class="form-group">
              <div class="form-group has-feedback has-feedback-left">
                <input type="phone" class="form-control" name="phone" :value="old('phone')"  placeholder="ادخل رقم الهاتف"
                  style="direction: rtl;font-size: 14px;border-radius: 2px;border-color: #e7e6e6!important;border: 1.4px solid;" >
                {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
                <div class="form-control-feedback"><i class="sicon-user text-muted text-bottom"></i></div>
              </div>
              <!-- <label for="email">الايميل</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email"> -->
            </div>
            <div class="form-group">
              <div class="form-group has-feedback has-feedback-left">
                <input type="password" class="form-control" name="password"  placeholder="كلمة المرور" :value="old('password')"
                  style="font-size: 14px;direction: rtl;border-radius: 2px;border-color: #e7e6e6!important;border: 1.4px solid;" required>
                  {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
                <div class="form-control-feedback"><i class="sicon-key text-muted text-bottom"></i></div>
              </div>
              <!-- <label for="password">كلمه المرور</label>
              <input type="password" class="form-control" id="password" placeholder="Password"> -->
            </div>
            <div class="form-group login-options">
              <div class="row" style="flex-direction: row-reverse;">
                <div class="col-6 " id="remember_box" style="
">
                  <label class="checkbox-inline" style="
direction: rtl;
font-size: 14px;
color: #4c4949;
">
                    <div class="checker" id="uniform-remember" style="
display: inline-block;
margin-left: 8px;
margin-right: 18px;
"><span class="checked"><input type="checkbox" name="remember" id="remember" checked="checked" class="styled"></span>
                    </div>
                    تذكرني
                  </label>
                </div>
                <div class="col-6" style="
text-align: start;
">
                  <a href="https://s.salla.sa/password/reset" style="
color: #00e3af;
text-decoration: none;
font-size: 16px;
margin-left: 2px;
">نسيت كلمة المرور؟</a>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary" style="
background-color: #8dfee4;
border: 0;
border-radius: 2px;
width: 30%;
margin-left: auto;
margin-right: auto;
display: flex;
justify-content: space-around;
font-size: 14px;
font-weight: bold;
color: #004d5a;
">الدخــول</button>
          </form>
        </div>

        <!-- <div id="register_box">
        <div class="content-divider text-muted form-group"><span class="content-divider-span"  style="
align-items: center;
display: flex;
justify-content: center;
">ليس لديك حساب متجر ؟
          </span></div>
        <a href="#register" class="btn btn-tiffany btn-block btn-flat content-group mb-0">إنشاء متجر
          جديد</a>
      </div> -->





            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <script>


    $(document).ready(function () {
      $('.nav-pills a').click(function () {
        $(this).tab('show');
      });
    });

  </script>

</body>

</html>


{{-- 

<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
