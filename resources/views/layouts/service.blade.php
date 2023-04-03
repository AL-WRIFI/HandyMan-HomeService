<!DOCTYPE html>
<html lang="ar" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>الخدمات</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/bondi.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/cards1.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/wizard.css')}}" />
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css"> --}}
    <link href="http://127.0.0.1:8000/assets/admin-module/css/material-icons.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>

    @livewireStyles
  
    
</head>


<header class="site-header sticky-top py-1" style=" background-color: rgb(255 255 255 / 92%); box-shadow: 0px 0px 0.125rem rgba(65, 83, 179, 0.05), 0px 0.75rem 1.5rem -0.25rem rgba(65, 83, 179, 0.05); margin-bottom: 50px;">
    <nav class="container-fluid d-flex  flex-row  m-0" style="justify-content: space-between;">

        <div class=" col">
           
            @if(Auth::check())
           
            {{-- <form name="submitForm" method="POST" action="{{route('logout')}}">
                <input type="hidden" name="param1" value="param1Value">
                <A href="javascript:document.submitForm.submit()">خروج</A>
                </form>      --}}
                <a href="{{route('user-profile')}}" class="py-2   d-inline-block" >
                  {{Auth::guard('web')->user()->name}}  
                </a>    
                <a href="{{route('logout')}} " class="py-2   d-inline-block" >
                    خروج
                </a>    
            @else
            <a class="py-2  d-inline-block" href="{{route('login')}}">
                تسجيل الدخول
            </a>
            @endif

            <a class="py-2   d-inline-block" href="#">
                <img src="{{ asset('assets/svg/user-tie.svg') }}" alt="{{ asset('assets/svg/user-tie.svg') }}" style="width: 25px;height: 25px; ">
            </a>
        </div>


        <div class=" row col-6 justify-content-center" style="direction: rtl; align-items: center;">
            <div class="col-2">
                <a class="py-2  d-none d-md-inline-block" href="{{route('user-home')}}" style="  font-size: 12px;">
                    {{-- <img src="{{ asset('assets/svg/home.svg') }}" alt="" style="width: 20px;height: 20px;"> --}}
                    <h5 style="font-size: 14px;">الرئيسية</h5>
                </a>
            </div>
            <div class="col-2">
                <a class="py-2  d-none d-md-inline-block" href="{{route('user-order')}}">
                    {{-- <img src="{{ asset('assets/svg/orders.svg') }}" alt="" style="width: 20px;height: 20px;"> --}}
                    <h5 style="font-size: 14px;">طلباتي</h5>
                </a>
            </div>
            <div class="col-4" style="text-align: start;">
                <a class=" py-2 d-none d-md-inline-block" href="{{route('completed-order')}}">
                    {{-- <img src="{{ asset('assets/svg/orders.svg') }}" alt="" style="width: 20px;height: 20px;"> --}}
                    <h5 style="font-size: 14px;"> الطلبات المنفذه</h5>
                </a>
            </div>
        </div>






        {{-- <a class="py-2  d-none d-md-inline-block" href="{{route('user-profile')}}" style=" font-size: 12px;">
            <img src="{{ asset('assets/svg/gear.svg') }}" alt="" style="width: 20px;height: 20px;">
            <h5 style="font-size: 14px;">الاعدادت</h5>
        </a> --}}

        {{-- <a class="py-2  d-none d-md-inline-block" href="#">
            <img src="{{ asset('assets/svg/location.svg') }}" alt="" style="width: 20px;height: 20px;">
            <h5 style="font-size: 14px;">حدد موقعك</h5>
        </a> --}}


<div class=" col" style="
    display: flex;
    align-items: center;
    justify-content: flex-end;
">
  <a class="py-2 mx-2" href="#" aria-label="Product">
            <h3><strong>أجيــر</strong></h3> </a>
</div>



        {{--
        البحث
        <div class="container-serch py-2">
            <input type="text" placeholder="Search...">
            <div class="search"></div>
        </div> --}}


    </nav>
</header>

{{-- background-color: rgb(233, 233, 232) --}}

<body my-3 style="font-family: Cairo; background-image: url('{{ asset('assets/svg/settings.svg') }}');background-repeat: no-repeat; background-attachment: fixed;
  background-position: center;  ">



    <main>
        {{ $slot }}

        <br>
        <br>    
    </main>
    



    <footer class="  mt-3 fixed-bottom  d-md-none" style="background-color: rgb(255 255 255); height: fit-content;margin-top: 51px;">
        <nav class="navbar navbar-expand  d-sm-none d-md-none fixed-bottom pt-1 m-0" style="background-color: #2929d3">
            <div class="container flex-row ">



                <ul class="navbar-nav  text-center col-12   " style="height: 50px;">

                    <li class="nav-item col-4 pt-0  ">
                        <a class="nav-link pt-2  " href="{{route('completed-order')}}">             
                                <img src="{{ asset('assets/svg/orders.svg') }}" alt="" style="width: 30px;height: 25px; "> 
                            <h6 style="color:aliceblue"> المكتملة </h6>
                        </a>

                    </li>
                    <li class="nav-item col-4 pt-0 ">
                        <a class="nav-link pt-2  " href="{{route('user-home')}}">
                            <img src="{{ asset('assets/svg/home.svg') }}" alt="" style="width: 25px;height: 25px; "> 
                            <h6 style="color:aliceblue"> الرئيسية </h6> 
                        </a>
                    </li>
                    <li class="nav-item col-4 pt-0 ">
                        <a class="nav-link pt-2 " href="{{route('UserOrder')}}">
                            <img src="{{ asset('assets/svg/orders.svg') }}" alt="" style="width: 30px;height: 25px; "> 
                            <h6 style="color:aliceblue"> المؤكدة </h6>
                            
                        </a>
                    </li>


                </ul>


        </nav>
    
    </footer>
    {{-- <nav class="navbar navbar-expand  d-sm-none d-md-none fixed-bottom pt-1 m-0">
        <div class="container flex-row ">



            <ul class="navbar-nav  text-center col-12   " style="height: 50px;">

                <li class="nav-item col-4 pt-0  ">
                    <a class="nav-link pt-0  " aria-current="page" href="#"><svg xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img"
                            viewBox="0 0 24 24">
                            <title>Product</title>
                            <circle cx="12" cy="12" r="10"></circle>
                            <path
                                d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94">
                            </path>
                        </svg>
                        <h6> الاعدادت </h6>
                    </a>

                </li>
                <li class="nav-item col-4 pt-0 ">
                    <a class="nav-link pt-0  " href="{{route('handyman.index')}}">
                        <h6> الرئيسية </h6>
                    </a>
                </li>
                <li class="nav-item col-4 pt-0 ">
                    <a class="nav-link pt-0 " href="{{route('handyman.approved-order')}}"><svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto"
                            role="img" viewBox="0 0 24 24">
                            <title>Product</title>
                            <circle cx="12" cy="12" r="10"></circle>
                            <path
                                d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94">
                            </path>
                        </svg>
                        طلباتي
                    </a>
                </li>


            </ul>


    </nav> --}}




    @livewireScripts
    {{-- <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        const pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
            cluster: '{{ env('PUSHER_APP_CLUSTER') }}'
            // auth: {
            //  headers: {
            // 'X-CSRF-Token': "{{ csrf_token() }}",
            //    },
            // },
            // authEndpoint: '/broadcasting/auth',
        });
    
        const channel = pusher.subscribe('accsptedorder');
        channel.bind('App\\Events\\AccsptedOrder', function(data) {
            
            Livewire.emit('orderApproved', data);
        });
    </script> --}}
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false"></script> --}}
    <script type="text/javascript" src="{{asset('assets/js/all.min.js')}}"></script>
    {{-- <script type="text/javascript" src="{{asset('assets/js/var.js')}}"></script> --}}
    <script type="text/javascript" src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}


    <script>
        /*============================================
        11: File Upload
        ==============================================*/
        $(window).on('load', function() {
        $(".upload-file__input").on("change", function () {
        if (this.files && this.files[0]) {
        let reader = new FileReader();
        let img = $(this).siblings(".upload-file__img").find('img');

        reader.onload = function (e) {
        img.attr("src", e.target.result);
        console.log($(this).parent());
        };

        reader.readAsDataURL(this.files[0]);
        }
        });
        })
    </script>
</body>

</html>
