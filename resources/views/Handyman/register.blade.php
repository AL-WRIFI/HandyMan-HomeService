<!DOCTYPE html>
<html lang="ar" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>الخدمات</title>
    <link href="http://127.0.0.1:8000/assets/admin-module/css/material-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/admin-module/css/bootstrap.min.css"/>
    <link rel="stylesheet"
    href="http://127.0.0.1:8000/assets/admin-module/plugins/perfect-scrollbar/perfect-scrollbar.min.css"/>
   
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/admin-module/css/style.css"/>
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/admin-module/css/dev.css"/>
    
    <link href="http://127.0.0.1:8000/assets/admin-module/css/material-icons.css" rel="stylesheet">
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" /> -->
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
                <a href="" class="py-2   d-inline-block" >
                  {{Auth::user()->name}}  
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


<body my-3 style="font-family: 'Cairo', sans-serif; font-size:15px ">



    


<div  style="margin-right: 10%; margin-top: 3%; width:80% ;" >
<!-- Wrapper -->
<main class="">
    
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 pb-4">
                    <div class="page-title-wrap mb-3">
                        <h2 style="font-size:30px; font-family: 'Cairo', sans-serif;"> تسجيل كمزود خدمة</h2>
                    </div>

                    <form action="{{route('handyman.register')}} " method="POST" enctype="form-data">
                        @csrf 
                                               
                        <div class="row gx-2 mt-2">
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex flex-wrap justify-content-between gap-3 mb-20">
                                            <h4 class="c1 mb-20">معلومات الحساب</h4>
                                        </div>
                                        <div class="form-floating mb-30">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{old('name')}}" placeholder="name" required>
                                                    @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                            <label>الأسم</label>
                                        </div>
                                        <div class="row gx-2">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-30">
                                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                           value="{{old('phone')}}"
                                                           placeholder="Phone" >
                                                    <label>الهاتف</label>
                                                    @error('phone')
                                                    <div class="">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-30">
                                                    <input type="email" class="form-control" name="email"
                                                           value="{{old('email')}}"
                                                           placeholder="Email" required>
                                                    <label>الايميل</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row gx-2">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-30">
                                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                                            placeholder="Password" required>
                                                            
                                                    <label>كلمة المرور</label>
                                                    <span class="material-icons togglePassword">visibility_off</span>
                                                    @error('password')
                                                            <div class="">{{ $message }}</div>
                                                            @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-30">
                                                    <input type="password" class="form-control  @error('confirm_password') is-invalid @enderror" name="confirm_password"
                                                            placeholder="Confirm_Password" required>
                                                    @error('confirm_password')
                                                    <div class="">{{ $message }}</div>
                                                    @enderror
                                                    <label>تأكيد كلمة المرور</label>
                                                    <span class="material-icons togglePassword">visibility_off</span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                            <div class="d-flex flex-column align-items-center gap-3">
                                                <h3 class="mb-0">الصورة</h3>
                                                <div>
                                                    <div class="upload-file">
                                                        <input type="file" class="upload-file__input @error('image') is-invalid @enderror" name="image" >
                                                        <div class="upload-file__img">
                                                            <img
                                                                src="{{asset('assets/admin-module')}}/img/media/upload-file.png"
                                                                onerror=""
                                                                alt="" required>
                                                        </div>
                                                        <span class="upload-file__edit">
                                                            <span class="material-icons">edit</span>
                                                        </span>
                                                        @error('image')
                                                    <div class="">{{ $message }}</div>
                                                    @enderror
                                                    </div>
                                                </div>
                                                <p class="opacity-75 max-w220 mx-auto">صيغ الصورة - jpg, png,
                                                    jpeg,
                                                    gif Image
                                                    Size -
                                                    maximum size 2 MB Image Ratio - 1:1</p>

                                                    @error('image')
                                                    <div class="">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h4 class="c1 mb-20">معلومات المزود </h4>
                                        <div class="mb-30">
                                            <select class="js-select theme-input-style w-100" name="category_id">
                                                <option value="0" required>أختر المهنة</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row gx-2">
                                            <div class="col-lg-6">
                                            
                                            <select class="js-select theme-input-style w-100" name="city_id">
                                                <option value="0" required>المدينة</option>
                                                @foreach($cities as $city)
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        
                                        <div class="col-lg-6">
                                            <select class="js-select theme-input-style w-100" name="zone_id">
                                                <option value="0" required>المنطقة</option>
                                                @foreach($zones as $zone)
                                                <option value="{{$zone->id}}">{{$zone->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div> 
                                        <br>                              
                                        <div class="form-floating mb-30">
                                            <textarea class="form-control" placeholder="address_note"
                                                name="address_note" required>{{old('address_note')}}</textarea>
                                            <label>العنوان</label>
                                        </div>
                                        <div class="form-floating mb-30">
                                            <textarea class="form-control" placeholder="وصف"
                                                name="description" required>{{old('description')}}</textarea>
                                            <label>وصف قصير</label>
                                        </div>
                                        <div class="mb-30">
                                            <select class="select-identity theme-input-style w-100" name="identity_type" >
                                                <option>نوع الهوية</option>
                                                <option value="جواز سفر"
                                                    {{old('identity_type') == 'جواز' ? 'selected': ''}}>
                                                     جواز سفر</option>
                                                <option value="بطاقة شخصية"
                                                    {{old('identity_type') == 'بطاقة شخصية' ? 'selected': ''}}>
                                                    بطاقة شخصية</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-floating mb-30">
                                            <input type="text" class="form-control" name="identity_number"
                                                    value="{{old('identity_number')}}"
                                                    placeholder="Identity_Number" >
                                            <label>رقم الهوية</label>
                                        </div>

                                        <div class="upload-file w-100">
                                            <h3 class="mb-3">صورة الهوية</h3>
                                            <div id="multi_image_picker"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <br>
                        
                        <div class="d-flex gap-4 flex-wrap justify-content-end mt-20">
                            <button type="reset" class="btn btn--secondary" style="width:15% ;font-size:20px; font-family: 'Cairo', sans-serif;">اعادة</button>
                            <button type="submit" class="btn btn--primary" style="width:15% ;font-size:20px; font-family: 'Cairo', sans-serif;">تسجيل</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  
</main>
</div>






    <footer class="  mt-3 fixed-bottom  d-md-none" style="background-color: rgb(255 255 255); height: fit-content;margin-top: 51px;">
        <nav class="container d-flex  " style="justify-content: space-evenly;">





            <a class=" fotter-a py-2   d-inline-block" href="{{route('user-order')}}">
                <img src="{{ asset('assets/svg/file-history-line.svg') }}" alt="" style="width: 20px;height: 20px;">
                <h5 style="font-size: 14px; border-bottom: 1px solid #68e1fd;"> الطلبات المنفذه</h5>
            </a>


            <a class=" fotter-a py-2   d-inline-block" href="{{route('user-order')}}">
                <img src="{{ asset('assets/svg/orders (1).svg') }}" alt="" style="width: 20px;height: 20px;">
                <h5 style="font-size: 14px; border-bottom: 1px solid #68e1fd;">طلباتي</h5>
            </a>



            <a class=" fotter-a py-2   d-inline-block" href="{{route('user-home')}}">
                <img src="{{ asset('assets/svg/home.svg') }}" alt="" style="width: 20px;height: 20px;">
                <h5 style="font-size: 14px; border-bottom: 1px solid #68e1fd;">الرئيسية</h5>
            </a>


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
    <script src="http://127.0.0.1:8000/assets/admin-module/js/jquery-3.6.0.min.js"></script>
    <script src="http://127.0.0.1:8000/assets/admin-module/js/bootstrap.bundle.min.js"></script>
    <script src="http://127.0.0.1:8000/assets/admin-module/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="http://127.0.0.1:8000/assets/admin-module/js/main.js"></script>
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false"></script>
    <script type="text/javascript" src="{{asset('assets/js/all.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
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
    <script src="http://127.0.0.1:8000/assets/provider-module/js//tags-input.min.js"></script>
    <script src="http://127.0.0.1:8000/assets/provider-module/js/spartan-multi-image-picker.js"></script>
    <script>
        $("#multi_image_picker").spartanMultiImagePicker({
            fieldName: 'identity_images[]',
            maxCount: 2,
            allowedExt: 'png|jpg|jpeg',
            rowHeight: 'auto',
            groupClassName: 'item',
            //maxFileSize: '100000', //in KB
            dropFileLabel: "Drop_here",
            placeholderImage: {
                image: 'http://127.0.0.1:8000/assets/admin-module/img/media/banner-upload-file.png',
                width: '100%',
            },

            onRenderedPreview: function (index) {
                toastr.success('Image_added', {
                    CloseButton: true,
                    ProgressBar: true
                });
            },
            onRemoveRow: function (index) {
                console.log(index);
            },
            onExtensionErr: function (index, file) {
                toastr.error('Please_only_input_png_or_jpg_type_file', {
                    CloseButton: true,
                    ProgressBar: true
                });
            },
            onSizeErr: function (index, file) {
                toastr.error('File_size_too_big', {
                    CloseButton: true,
                    ProgressBar: true
                });
            }

        });
    </script>

    <script>
        var input = document.querySelector("#phone");
        intlTelInput(input, {
            preferredCountries: ['bd', 'us'],
            initialCountry: "auto",
            geoIpLookup: function (success, failure) {
                $.get("https://ipinfo.io", function () { }, "jsonp").always(function (resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "bd";
                    success(countryCode);
                });
            },
        });
    </script>
</body>

</html>
