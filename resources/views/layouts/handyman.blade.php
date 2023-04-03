<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>الخدمات</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bondi.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/cards1.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/wizard.css') }}" />
    <link href="http://127.0.0.1:8000/assets/admin-module/css/material-icons.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <style>
        body {

            background-color: rgb(249 249 249) !important;
            font-family: 'Cairo', sans-serif;
        }

        /* This is your sidebar1 styling */


        /* This is your offcanvas overlay styling */
        .offcanvas-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgb(189 218 226 / 64%);
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            z-index: -1;
        }

        /* This is the active state for the offcanvas overlay */
        .offcanvas-overlay.active {
            opacity: 1;
            z-index: 1;
        }

        .toggle-menu-button i,
        .toggle-menu-button .material-icons {
            font-size: 1.75rem;
        }
    </style>

    @livewireStyles
    
</head>




<!-- start saidpar-->

<div class=" sidebar1  d-md-block  " id="myDIV" style="display: none">

    <div class=" py-1 m-auto d-md-none">
        <button class="toggle-menu-button  border-0 bg-transparent p-0 dark-color " onclick="myfon()"
            style=" width: fit-content; margin-left: 10px; margin-top: 10px; color: #17a2b8;">
            <span class="material-icons">menu</span>
        </button>
    </div>


    <div class="  text-center container mt-3  ">
<br>


        <ul style="list-style-type: none;padding: 0;margin: 20px;">
            <li>
                <a href="#">
                    <img src="{{asset('storage/' . Auth::guard('handyman')->user()->image)}}" alt=""
                        style="width: 100px;height: 100px;border-radius: 50px;margin-bottom: 10px;">
                </a>
            </li>
            <li style=" margin-bottom: 8px;">
                <a href="{{route('handyman.shandymanprofile')}}" style="font-size: 25px;">
                    <span class="material-icons" title="">{{Auth::guard('handyman')->user()->name}}</span>


                </a>
            </li>
            <li>
                <span>{{Auth::guard('handyman')->user()->AvgRating()}}</span>
                <h6 style=" display: inline;"> : تقييمك العام </h6>
                
                        
            </li>
            <li>
                @livewire('handyman.handyman-status',[
                            'model'=>  Auth::guard('handyman')->user(),
                            'field'=> 'status',
                        ])
            </li>
        </ul>


    </div>

    <div class=" mt-5 text-end ">
        <ul style="list-style-type: none; padding: 0; ">
            <li>
                <a href="{{route('handyman.service.price')}}" class="" style="padding-right: 10px;">
                    <span class="link-title" style="padding-right: 6px;">اسعار الخدمات</span>
                    <span class="material-icons" title="">design_services</span>

                </a>
            </li>
            <hr class="p-0 my-2" style=" width: 90%;margin-left: auto; margin-right: auto;background-color:black;">
            <li>
                <a href="{{route('handyman.work-time')}}" class="" style=" padding-right: 10px;">
                    <span class="link-title" style=" padding-right: 6px;"> اوقات العمل</span>
                    <span class="material-icons" title="">design_services</span>

                </a>
            </li>
            <hr class="   text-black p-0 my-2" style=" width: 90%;margin-left: auto; margin-right: auto;">
            <li>
                <a href="#" class="" style=" padding-right: 10px;">
                    <span class="link-title" style="padding-right: 6px;">الارشادات والتعليمات</span>
                    <span class="material-icons" title="">design_services</span>

                </a>
            </li>
            <hr class="p-0 my-2" style="width: 90%;margin-left: auto; margin-right: auto; background-color:black;">
            <li>
                <a href="#" class="" style=" padding-right: 10px;">
                    <span class="link-title" style="padding-right: 6px;">الدعم والمساعدة</span>
                    <span class="material-icons" title="">design_services</span>

                </a>
            </li>
           <br>
           <br>
   
           




        </ul>
        <br>
        <div class="row mt-3">
            <form action="{{route('handyman.logout')}}" method="POST">
                @csrf
                <div class="col-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-info "
                        style="font-size: 60%;border-radius: 2px;font-weight: 500;">
                        تسجيل الخروج</button>
                </div>
            </form>
        </div>


    </div>







</div>

<!--end saidpar-->

<body>




    <header class="site-header sticky-top py-1" style=" background-color: white; ">
        <div class="row p-0 m-0">
            @livewire('notification.index')
           
            <nav class="   col-9  col-md-4 col-lg-6 p-0 m-0   ">

                <div class="container d-flex  flex-row p-0 m-0   " style="justify-content: center;">



                    <h5 class="p-0 m-auto d-md-none">أجيــــر</h5>
                    {{-- <input type="search" class="p-0 m-auto d-md-none  form-control-dark" placeholder="بحث"
                        aria-label="Search"
                        style="direction: rtl;height: fit-content;align-self: center;border-radius: 8px;text-indent: 10px;">
                    --}}



                    <div class=" py-1 m-0 d-md-none">
                        <button class="toggle-menu-button open-sidebar1-btn border-0 bg-transparent p-0 dark-color "
                            onclick="myfon()" style=" width: fit-content; margin-right: 10px;">
                            <span class="material-icons">menu</span>
                        </button>
                    </div>
                    {{-- <div class="col-3">
                        <!-- Header Menu -->
                        <div class="header-toogle-menu">
                            <button class="toggle-menu-button aside-toggle border-0 bg-transparent p-0 dark-color">
                                <span class="material-icons">menu</span>
                            </button>
                        </div>
                        <!-- End Header Menu -->
                    </div> --}}




                    <a class="py-1 mx-2 d-none d-md-inline-block" href="{{route('handyman.history-orders')}}">
                        {{--
                        <x-iconsax-two-setting-2
                            style="display: block;width:25px;height: 25px;color: #4a4af9;padding-left: 7px;" /> --}}

                        <img src="{{ asset('assets/svg/gear.svg') }}" alt="" style="width: 25px;height: 25px;"><br>
                        المكتملة
                    </a>

                    <a class="py-1 mx-2 d-none d-md-inline-block" href="{{route('handyman.index')}}">
                        {{--
                        <x-icomoon-home
                            style="display: block;width:25px;height: 25px;color: #4a4af9;padding-left: 7px;" /> --}}
                        <img src="{{ asset('assets/svg/home.svg') }}" alt="" style="width: 25px;height: 25px;"><br>
                        الجديدة


                    </a>
                    <a class="py-1 mx-2 d-none d-md-inline-block" href="{{route('handyman.approved-order')}}">
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            class="d-block mx-auto" role="img" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path
                                d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94">
                            </path>
                        </svg> --}}
                        <img src="{{ asset('assets/svg/gear.svg') }}" alt="" style="width: 25px;height: 25px;"><br>
                        المؤكدة
                    </a>
                </div>
            </nav>

        </div>


    </header>

    <!-- This is your offcanvas overlay -->
   







    <main>
        {{ $slot }}
    </main>


    <footer class="  mt-3 fixed-bottom  d-md-none" style="background-color: rgb(255 255 255); height: fit-content;margin-top: 51px;">

        <nav class="navbar navbar-expand  d-sm-none d-md-none fixed-bottom pt-1 m-0" style="background-color: #2929d3">
            <div class="container flex-row ">



                <ul class="navbar-nav  text-center col-12   " style="height: 50px;">

                    <li class="nav-item col-4 pt-0  ">
                        <a class="nav-link pt-2  " href="{{route('handyman.history-orders')}}">             
                                <img src="{{ asset('assets/svg/gear.svg') }}" alt="" style="width: 25px;height: 25px; "> 
                            <h6 style="color:aliceblue"> المكتملة </h6>
                        </a>

                    </li>
                    <li class="nav-item col-4 pt-0 ">
                        <a class="nav-link pt-2  " href="{{route('handyman.index')}}">
                            <img src="{{ asset('assets/svg/gear.svg') }}" alt="" style="width: 25px;height: 25px; "> 
                            <h6 style="color:aliceblue"> الجديدة </h6> 
                        </a>
                    </li>
                    <li class="nav-item col-4 pt-0 ">
                        <a class="nav-link pt-2 " href="{{route('handyman.approved-order')}}">
                            <img src="{{ asset('assets/svg/gear.svg') }}" alt="" style="width: 25px;height: 25px; "> 
                            <h6 style="color:aliceblue"> المؤكدة </h6>
                            
                        </a>
                    </li>


                </ul>


        </nav>
    </footer>



    @livewireScripts
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
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
    
        const channel = pusher.subscribe('notifications');
        channel.bind('App\\Events\\NewNotification', function(data) {
            
            Livewire.emit('notificationOrder', data);
        });
    </script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false"></script> --}} 
        <script type="text/javascript" src="{{ asset('assets/js/script.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/all.min.js') }}"></script>
    {{-- <script type="text/javascript" src="{{asset('assets/js/var.js')}}"></script> --}}
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        // Select the sidebar1 and offcanvas overlay elements
                 var sidebar1 = document.querySelector('.sidebar1');
                var overlay = document.querySelector('.offcanvas-overlay');

                // Select the element that opens the sidebar1
                var openBtn = document.querySelector('.open-sidebar1-btn');
        function myfon() {
                    var x = document.getElementById("myDIV");
                    if (x.style.display === "none") {

                        x.style.display = "block";
                    } else {
                        x.style.display = "none";
                         // Remove the "active" class from the overlay
                         overlay.classList.remove('active');
                    }


                }


                // // Add an event listener to the open button
                // openBtn.addEventListener('click', function() {
                // // Add the "active" class to the overlay
                // overlay.classList.add('active');

                // // Move the sidebar1 into view

                // });

                // // Add an event listener to the overlay
                // overlay.addEventListener('click', function() {
                // // Remove the "active" class from the overlay
                // overlay.classList.remove('active');

                // // Move the sidebar1 out of view
                // sidebar1.style.display = "none";
                // });

                // // Add a window resize event listener to check if the screen size changes
                // window.addEventListener('resize', function() {
                // // Check if the screen is small and the sidebar1 is open
                // if (window.innerWidth < 768 && sidebar1.style.left==='0px' ) { // Add the "active" class to the overlay
                //     overlay.classList.add('active'); } else { // Remove the "active" class from the overlay
                //     overlay.classList.remove('active'); } });


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
