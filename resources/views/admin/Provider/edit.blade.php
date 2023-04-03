@extends('admin.layouts.master')

@section('title','تعديل مزود')

@push('css_or_js')
    {{--  Int ph  --}}
    <!-- CSS -->
    {{--<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet' type='text/css'>--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" />
    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.min.js"></script>

    <style>
        .iti { width: 100%; }
        /*.iti__arrow { border: none; }*/
    </style>

@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 pb-4">
                    <div class="page-title-wrap mb-3">
                        <h2 class="page-title">تعديل المزود</h2>
                    </div>

                    <form action="{{route('handymans.update',$handyman->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="row gx-2 mt-2">
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex flex-wrap justify-content-between gap-3 mb-20">
                                            <h4 class="c1 mb-20">معلومات الحساب</h4>
                                        </div>
                                        <div class="form-floating mb-30">
                                            <input type="text" class="form-control" name="name"
                                                    value="{{$handyman->name}}" placeholder="name" required>
                                            <label>الأسم</label>
                                        </div>
                                        <div class="row gx-2">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-30">
                                                    <input type="tel" class="form-control" name="phone"
                                                           value="{{$handyman->phone}}"
                                                           placeholder="Phone" required>
                                                    <label>الهاتف</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-30">
                                                    <input type="email" class="form-control" name="email"
                                                           value="{{$handyman->email}}"
                                                           placeholder="Email" required>
                                                    <label>الايميل</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row gx-2">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-30">
                                                    <input type="password" class="form-control" name="password"
                                                       value="{{$handyman->password}}" placeholder="Password" required>
                                                    <label>كلمة المرور</label>
                                                    <span class="material-icons togglePassword">visibility_off</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-30">
                                                    <input type="password" class="form-control" name="confirm_password"
                                                    value="{{$handyman->password}}" placeholder="Confirm_Password" required>
                                                    <label>تأكيد كلمة المرور</label>
                                                    <span class="material-icons togglePassword">visibility_off</span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                            <div class="d-flex flex-column align-items-center gap-3">
                                                <h3 class="mb-0">الصورة</h3>
                                                <div>
                                                    <div class="upload-file">
                                                        <input type="file" class="upload-file__input" name="image" >
                                                        <div class="upload-file__img">
                                                            <img
                                                                src="{{asset('storage/'.$handyman->image)}}"
                                                                onerror=""
                                                                alt="">
                                                        </div>
                                                        <span class="upload-file__edit">
                                                            <span class="material-icons">edit</span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <p class="opacity-75 max-w220 mx-auto">صسغة الصورة: - jpg, png,
                                                    jpeg,
                                                    gif Image
                                                    Size -
                                                    maximum size 2 MB Image Ratio - 1:1</p>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h4 class="c1 mb-20">معلومات المزود</h4>
                                        <div class="mb-30">
                                            <select class="js-select theme-input-style w-100" name="category_id">
                                                <option value="0" required>المهنة</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}" @selected($category->id == $handyman->category_id)>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row gx-2">
                                            <div class="col-lg-6">
                                            
                                            <select class="js-select theme-input-style w-100" name="city_id">
                                                <option value="0" required>المدينة</option>
                                                @foreach($cities as $city)
                                                <option value="{{$city->id}}" @selected($city->id == $handyman->city_id)>{{$city->name}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        
                                        <div class="col-lg-6">
                                            <select class="js-select theme-input-style w-100" name="zone_id">
                                                <option value="0" required>المنطقة</option>
                                                @foreach($zones as $zone)
                                                <option value="{{$zone->id}}" @selected($zone->id == $handyman->zone_id) >{{$zone->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div> 
                                        <br> 
                                        <div class="form-floating mb-30">
                                            <textarea class="form-control" placeholder="address_note"
                                                name="address_note" required>{{$handyman->address_note}}</textarea>
                                            <label>العنوان</label>
                                        </div>
                                        <div class="form-floating mb-30">
                                            <textarea class="form-control" placeholder="Address"
                                                name="description" required>{{$handyman->description}}</textarea>
                                            <label>وصف قصير</label>
                                        </div>
                                        <div class="mb-30">
                                            <select class="select-identity theme-input-style w-100" name="identity_type" >
                                                <option>نوع الهوية</option>
                                                <option value="جواز سفر"
                                                    {{$handyman->identity_type == 'جواز' ? 'selected': ''}}>
                                                     جواز سفر</option>
                                                <option value="بطاقة شخصية"
                                                    {{$handyman->identity_type == 'بطاقة شخصية' ? 'selected': ''}}>
                                                    بطاقة شخصية</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-floating mb-30">
                                            <input type="text" class="form-control" name="identity_number"
                                                    value="{{$handyman->identity_number}}"
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
                            <button type="submit" class="btn btn--primary">تحديث</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Content -->
@endsection

@push('script')

    <script src="{{asset('assets/handyman-module')}}/js//tags-input.min.js"></script>
    <script src="{{asset('assets/handyman-module')}}/js/spartan-multi-image-picker.js"></script>
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
                image: '{{asset('assets/admin-module')}}/img/media/banner-upload-file.png',
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

@endpush
