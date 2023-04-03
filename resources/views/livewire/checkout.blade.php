<div>
<div class="container py-5 show" style="{{ $Steps == 5 ? 'display:none' : '' }}" >
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-8">
            <div class="card b-0">
                <h3 class="heading" style="
    text-align: end;
">طلب خدمة</h3>
                <p class="desc" style="
    text-align: end;
">التواصل مع الدعم <span class="yellow-text">738324002</span><br>الطلب المهني يجيك لباب بيتك!</p>


                <div class="progress-container  text-center" style="margin-left:auto; margin-right:auto;" >
                    <div class="progress" id="progress"
                        style="width:{{$barLength}}%; height: 9px; background-color:#3498db; "></div>
                    <div class="circle {{ $Steps >= 1 ? 'active' : '' }} ">1</div>
                    <div class="circle {{ $Steps >= 2 ? 'active' : '' }} ">2</div>
                    <div class="circle {{ $Steps >= 3 ? 'active' : '' }} ">3</div>
                    <div class="circle {{ $Steps >= 4 ? 'active' : '' }} ">4</div>
                </div>


           
                <div class="show" style="{{ $Steps != 1 ? 'display:none' : '' }}">
                    <h6 class="sub-heading">@livewire('cart-counter')اختر خدماتك</h6>
                    {{-- <a class="sub-heading">هل تريد خدمة اخرى؟</a> --}}

                    {{-- step 1 --}}
                    <div class="row ">
                        <div class="service-1 pt-2 container  text-black form-card">
                            <div class="col-row   ">

                                @forelse ($services as $service)

                                <div class="row row1 text-center pb-1 text-black  ">


                                    <div class="col-2 p-0">
                                        <img class="serv-img" src="{{ asset('storage/' . $service->image) }}">
                                    </div>
                                    <div class="col-3  p-0 text-end ">
                                        <div>
                                            <h5>{{ $service->name }}</h5>
                                        </div>
                                    </div>
                                    <div class="col-3  p-0">


                                        <div class="plus-row justify-content-center align-items-center">
                                            <button class="button-plus"
                                                wire:click="increment({{ $service->id }})"><strong>+</strong></button>
                                            <input wire:model="quantity.{{ $service->id }}"
                                                class="serv-input  px-2   py-1 " min="1" max="10" />
                                            <button class="button-plus"
                                                wire:click="decrease({{ $service->id }})"><strong>-</strong></button>
                                        </div>

                                    </div>

                                    <div class="col-2  p-0">
                                        <h5>
                                            {{$service->price * $quantity[$service->id]}}<small style="color:#1a73e8">(YER)</small>
                                        </h5>
                                    </div>
                                    <div class="col-2  p-0 text-center">
                                        @if ($cart->where('id', $service->id)->count())
                                        <button type="button" class="btn serv-btn"
                                            wire:click="removeFromCart({{ $service->id }})">ازالـة</button>
                                        @else
                                        <button type="button" class="btn serv-btn "
                                            wire:click="addToCart({{ $service }})"> <span>
                                                اضافه
                                            </span> </button>
                                        @endif
                                    </div>


                                </div>
                                <hr class=" serv-hr  text-black">
                                @empty
                                @endforelse
                            </div>
                        </div>

                    </div>
                    @if(Auth::check())
                    <button class="btn btn-primary" wire:click="fristStepSubmit">متابعه</button>
                    @else
                    {{-- <form method="get" action="{{ route('login') }}">
                        @csrf
                    
                        <input type="hidden" name="next" value="{{ Request::url() }}">
                    
                        <button type="submit" class="btn btn-primary "  >التالي</button>
                    </form> --}}
                    
                    
                    <button class="btn btn-primary " wire:click="login" >تسجيل الدخول </button><br>
                    <a href="{{route('login')}}">!! يجب تسجيل الدخول </a>
                    @endif
                    
                </div>
                {{-- end steps 1 --}}



                {{-- steps 2 --}}
                <div class="show" style="{{ $Steps != 2 ? 'display:none' : '' }}">
                    <div class="row">
                        <div class="service-1  form-card">
                            <div class="col-row">

                                <div class="col-3  ms-auto me-1 mb-2  text-end mt-3  " style="color: #2215da;">
                                    <h5>التاريخ</h5>
                                </div>
                                <div class="row row1 text-center pb-1 text-black mx-1  ">
                                    <div class="col-9 ms-auto me-1  text-end ">

                                        <input class="input_date" type="date" name="date" wire:model="date"
                                            value="dd/mm/yy">

                                    </div>
                                </div>

                                <div class="col-5 position-relative ms-auto me-1 mt-3  text-end  "
                                    style="color:  #6411ff;">
                                    <h5> حدد الفترة الزمنيه </h5>
                                </div>
                                @error('date') <span class="error">{{ $message }}</span> @enderror
                                <br>
                                @error('selectedTimeSlot') <span class="error">{{ $message }}</span> @enderror
                               
                                <div class="col-11  ms-auto me-0 text-end text-black"
                                    style=" height: 1px; top: -7px; position: relative;">
                                    <hr class="  text-black">
                                </div>


                                <div class="position-relative ms-auto me-4 mb-2  pb-3 text-end  ">

                                    

                                    <div class="row-date row text-center mx-2 me-0">
                                        @foreach($timeSlots as $timeSlot)
                                        <div class="col-5 col-md-3 ">
                                        <button class="time-slot {{ $selectedTimeSlot === $timeSlot ? 'selected' : '' }} py-1 me-1"
                                                wire:click="$set('selectedTimeSlot','{{ $timeSlot }}')">
                                          {{ $timeSlot }}
                                        </button>
                                        </div>
                                      @endforeach
                                        


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="direction: ltr;">
                        <button class="btn btn-primary " style="width: 30%" wire:click="back">الخلف</button>
                        <button class="btn btn-primary " style="width: 30%" wire:click="secondStepSubmit">التالي</button>
                    </div>

                </div>
                {{-- end steps 2 --}}



                {{-- steps 3 --}}
                <div class="show" style="{{ $Steps != 3 ? 'display:none' : '' }}">
                    <div class="dital row ">

                        {{-- <div class="row " style=" flex-direction: row-reverse">
                            <div class="col-6   text-end  " style="    color: rgb(70 70 70);">
                                <h5> الطلب </h5>
                            </div>
                        </div>

                        <div class="col-6  ms-auto me-2  ">

                            <div class=" row row-serv text-end   ">

                                @foreach ($cart as $item)
                                <div class="col  salla-item  ">
                                    <h6>{{ $item->name }}</h6>
                                </div>

                                @endforeach

                            </div>
                        </div>

                        <div class="row text-center  mt-3" style=" flex-direction: row-reverse">
                            <div class="col-6  text-end   " style="    color: rgb(70 70 70);">
                                <h5> تفاصيل الطلب</h5>
                            </div>
                        </div>
                        <hr style="margin-bottom: 0.5px;"> --}}


                        {{-- <div class="row text-center  mt-3" style=" flex-direction: row-reverse">

                            <div class="col-2  p-0 text-end   " style="    color: rgb(70 70 70);">
                                <h5> التاريخ</h5>
                            </div>
                            <div class="col-5 m-0 ps-1" style=" background-color: #ffffff;">
                                <h5 style="  border-bottom: 1px solid #ccc; font-size: smaller;">{{ $date ?? 'لم يتمم
                                    التحديد'}} </h5>
                            </div>
                            <div class="col-5 m-0 pe-1  " style="background-color: #ffffff;">
                                <h5 style=" border-bottom: 1px solid #ccc;font-size: smaller;"> {{ $time ?? 'لم يتم
                                    التحديد'}} </h5>
                            </div>

                        </div> --}}
                        <div class=" row text-black text-center mt-2 px-0" style=" flex-direction: row-reverse">
                           <div class="col-2 p-0 text-end   " style="    color: rgb(70 70 70);
                                    display: flex;
                                    align-content: center;
                                    flex-wrap: wrap;
                                    justify-content: center;
                                    padding: inherit;
                                    ">
                                    <h5 style="

                                    margin-bottom: 0;
                                    ">
                                     الموقع</h5>

                                </div>
                                <div class="row gx-2">
                                    <div class=" col-5  m-0 ps-1 text-black"
                                    style="
                                            display: flex;
                                            align-content: center;
                                            flex-wrap: wrap;
                                            justify-content: center;
                                            padding: inherit;
                                            ">
                                        <select  wire:model="zone" class="js-select theme-input-style w-100" name="zone_id" style="background-color: #f9f9f9;border-radius: 3px;direction: rtl">
                                            <option value="0" required>المنطقة</option>
                                            @foreach($zones as $zone)
                                            <option value="{{$zone->id}}"   >{{$zone->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('zone') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-5  m-0 ps-1 text-black"
                                    style="
                                            display: flex;
                                            align-content: center;
                                            flex-wrap: wrap;
                                            justify-content: center;
                                            padding: inherit;
                                            ">
                                    
                                    <select wire:model="city" class="js-select theme-input-style w-100" name="city_id" style="background-color: #f9f9f9;border-radius: 3px;direction: rtl">
                                        <option value="2" required>المدينة</option>
                                        @foreach($cities as $city)
                                        <option value="{{$city->id}}" >{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('city') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                
                               
                                </div>
                            {{-- <div class=" col-5  m-0 ps-1 text-black"
                            style="
                                    display: flex;
                                    align-content: center;
                                    flex-wrap: wrap;
                                    justify-content: center;
                                    padding: inherit;
                                    ">
                                <select wire:model="city"
                                    style=" width: 95%;background-color: #f9f9f9;border-radius: 3px;direction: rtl;height: 75%;display: flex;align-content:flex-start;flex-wrap: wrap; padding: 2%">
                                    <option value="0" required style="font-size: 90%">المدينة</option>
                                    @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-5 m-0 pe-1 text-black "
                            style="
                                    display: flex;
                                    align-content: center;
                                    flex-wrap: wrap;
                                    justify-content: center;
                                    padding: inherit;
                                    ">
                                <select  wire:model="zone"
                                   style="width: 95%;background-color: #f9f9f9;border-radius: 3px;direction: rtl;height: 75%;display: flex;align-content:center;flex-wrap:wrap;padding: 2%">
                                   <option value="0" required>المنطقة</option>
                                   @foreach($zones as $zone)
                                   <option value="{{$zone->id}}" wir>{{$zone->name}}</option>
                                   @endforeach
                                </select>
                            </div> --}}

                        </div>
                        
                        

                   
                        <div class="row  mt-3 mb-2 px-0" style=" flex-direction: row">
                            <div class="col-8   text-end  " style="    color: rgb(70 70 70);">
                                <h5> ملاحظه للفني </h5>
                            </div>
                            <div class="col-4   text-end  " style="color: rgb(70 70 70);">
                                <h5>
                                    اضافه صوره </h5>
                            </div>

                        </div>

                        <div class="row  px-0" style=" flex-direction:row">
                            <div class="col-8 p-0  text-end  text-black"style="justify-content: center;display: flex;align-content: center;flex-wrap: wrap;">
                                {{-- style=" overflow-wrap: break-word; resize: horizontal; width:90%;
                                background-color: #f9f9f9; border-bottom: 1px solid yellow;
                                border-radius: 5px;" --}}
                                <textarea name="notes" wire:model="note" placeholder="ملاحظات..."
                                    style="
                                 width: 95%;
                                 background-color: #f9f9f936;height: 55px;
                                 border: 0.3px solid #bfbfbf;
                                border-radius: 3px;
                                 padding: 5px;margin: 5px; margin-top: 0px; height: 68%;    direction: rtl;"></textarea>

                            </div>

                            <div class=" col-4" style="direction:rtl;">

                                <div class="upload-file ">
                                    <input type="file" class="upload-file__input" wire:model="image" name="image">
                                    <div class="upload-file__img" style="max-inline-size: 5.75rem;">
                                        <img onerror="" src="{{asset('assets/admin-module')}}/img/media/upload-file.png"
                                            alt="" style="width: 100%; height: 100%;">
                                    </div>
                                    <span class="upload-file__edit">
                                        <span class="material-icons">edit</span>
                                    </span>
                                </div>
                            </div>



                        </div>


                        {{-- <hr style="margin-bottom: 0.5px;"> --}}

                        {{-- <div class="row mt-2 px-0" style="direction: rtl;">

                            <div class="col-3   me-1 mt-2 text-end px-0 " style="color: rgb(70 70 70);">
                                <h5>
                                    طريقة الدفع </h5>

                            </div>
                            <div class="col-md-4  col-6 ms-3 pt-1 pb-1 px-0 text-black">
                                <select style="width:100% ; background-color: #f9f9f9;    border-radius: 3px;">
                                    <option> كاش </option>
                                    <option>الكريمي </option>
                                </select>
                            </div>
                        </div> --}}

                            
                    </div>
                    <div style="direction: ltr;">
                        <button class="btn btn-primary" wire:click="back">الخلف</button>
                        <button class="btn btn-primary " wire:click="thridStepSubmit">متابعة</button>
                    </div>
                </div>
                {{-- end steps 3 --}}

                <div class="show" style="{{$Steps != 4 ? 'display:none' : ''}}">

                    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"
                        rel="stylesheet">
                    <div class="container profile-page">
                        <div class="row" style="justify-content: center;">
                            @foreach ($handymans as $handyman)
                            <div class=" col-12 col-xl-6 col-lg-7 col-md-12 ">
                                <div class="card1 profile-header ">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-4">
                                                <div class="profile-image"> <img
                                                        src="{{asset('storage/'.$handyman->image)}}" alt=""> </div>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-8">
                                                <h6 class="m-t-0 m-b-0"><strong>
                                                    
                                                    <a href="#" wire:click="handymanStepSubmit({{$handyman->id}})">{{$handyman->name}}
                                                    </a></strong>
                                                </h6>
                                                <span class="job_post"><strong>التقيم: {{$handyman->avg_rating}}</a></strong><span>
                                                        <p> {{$handyman->description}}</p>
                                                        <div>
                                                            @if($provid[$handyman->id] == $pro)
                                                            <button class="btn btn-primary text-center"
                                                                style=" width:75px;height:30px ; padding:0%"
                                                                wire:click="UnSelectProvider({{$handyman->id}})">ازالـة</button>
                                                            @else
                                                            <button class="btn btn-primary text-center"
                                                                style="width:75px;height:30px ; padding:0%"
                                                                wire:click="SelectProvider({{$handyman->id}})">اختيار</button>
                                                            @endif
                                                        </div>
                                                       
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @error('pro') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div style="direction: ltr;">
                        <button class="btn btn-primary" wire:click="back">الخلف</button>
                    
                        <button class="btn btn-primary" wire:click="createOrder">ارسال</button>
                       
                    </div>
                </div>
                <!-- <button id="next1" class="btn-block btn-primary mt-3 mb-1 next">NEXT<span class="fa fa-long-arrow-right"></span></button> -->


            </div>
        </div>
    </div>
</div>

<div class="show" style="{{ $Steps != 5 ? 'display:none' : '' }}">
    <div class="row py-5 px-4"> 
      <div class="col-md-5 mx-auto"> 
      <div class="bg-white shadow rounded overflow-hidden"> 
      
      
                   <div class="px-3 pt-0 pb-0 cover"> 
                   <div>
                    <a href="#" wire:click="back">
                    <img src="{{asset('assets/svg/back4.png')}}">
                    </a>
                   </div>
                    <div class="media align-items-end profile-head">
                    <div class="profile mr-2">
                    <img src="{{asset('storage/'.$handyman->image)}}"
                            alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                            style="width: 100px; z-index: 1">
                  
                   </div>
                 
                 <div class="media-body mb-0 text-white"> 
  
                  <h4 class="mt-0 mb-1">{{$handyman->name}}</h4> <p class="small mb-0"> 
                    <i class="fas fa-map-marker-alt mr-2 "></i>{{$handyman->city->name}}</p> 
                    <div class="mt-0 mb-5">
                      <div class="{{ $handyman->status != 1 ? 'ofonline-indicator' : 'online-indicator'}}">
                        <span class="{{ $handyman->status != 1 ? '' : 'blink'}}"></span>
                      </div>
                      <h2 class="online-text" style="font-size: 100%">{{ $handyman->status != 1 ? 'غير متاح' : 'متاح'}}</h2>
                    </div> 
  
                  </div>
                  
                 </div> 
                </div> 
       
                  <div class="bg-light p-4  d-flex justify-content-end text-center"> 
                  
                   <ul class="list-inline mb-0">
                     <li class="list-inline-item"> 
                       <h5 class="font-weight-bold mb-0 d-block">{{$handyman->order_count}}</h5>
                       <small class="text-muted"><strong>عددالطلبات</strong></small> 
                     </li> 
  
                     <li class="list-inline-item"> 
                       <h5 class="font-weight-bold mb-0 d-block">{{$handyman->avg_rating}}</h5>
                       <small class="text-muted"> 
                        <strong> التقيم</strong></small> 
                       </li>
  
                       <li class="list-inline-item">
                         <h5 class="font-weight-bold mb-0 d-block">{{$handyman->category->name}}</h5>
                         <small class="text-muted"> <strong>المهنة</strong></small> 
                        </li> 
                     </ul> 
  
                     </div> 
  
              
              <div class="card-body p-4 text-black " style="text-align: right">
                <div class="mb-5">
                  <p class="lead fw-normal mb-1">عن المزود</p>
                  <div class="p-4" style="background-color: #f8f9fa;">
                    <p class="font-italic mb-1">{{$handyman->description}}</p>
                    {{-- <p class="font-italic mb-1">مدينة صنعاء</p>
                    <p class="font-italic mb-0"> يفضل العمل صباحاً </p> --}}
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-4">
                  <p class="lead fw-normal mb-0">الاعمال السابقة</p>
                  <p class="mb-0"><a href="#!" class="text-muted">عرض الكل</a></p>
                </div>
                <div class="row g-2">
                  @foreach($handyman->previousWorks as $previousWorks)
                  <div class="col mb-2">
                    <img src="{{asset('storage/'.$previousWorks->image)}}"
                      alt="image 1" class="w-100 rounded-3">
                  </div>
                  @endforeach
                </div>
              </div>
                 
              </div>
  
        </div> 
        
      </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.js"></script>


