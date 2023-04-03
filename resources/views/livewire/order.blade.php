
<div>
       
    <div class=" text-center text-white pt-2">
        <h2>سباكة</h2>
        <div class="col-md-8 col-5">
            @livewire('cart-counter')
        </div>
    </div>
    <div class="service-1 pt-2 ">
        
        <div class="col-row container  " style="max-width: 860px; ">
            <div class="stepwizard">
                <div class="stepwizard-row setup-panel">
                    <div class="stepwizard-step">
                        <a href="#step-1" type="button"
                           class="btn btn-circle {{ $Steps != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                        <p> اختر خدمتك</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-2" type="button"
                           class="btn btn-circle {{ $Steps != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                        <p>الوقت </p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-3" type="button"
                           class="btn btn-circle {{ $Steps != 3 ? 'btn-default' : 'btn-success' }}"
                           disabled="disabled">3</a>
                        <p>التفاصيل</p>
                    </div>
                </div>
            </div>
            <div class="row row1 pb-4 pt-2  ">
                
                <div class="col  text-white d-inline-flex justify-content-end">
                    
                    <h5>
                       <br>
                        
                    </h5>
                    
                </div>
                
                <div class="col  text-white d-inline-flex justify-content-center">
                    <h5>
                        
                    </h5>
                </div>
                
            </div>

        
        
        <div  class="row setup-content {{ $Steps != 1 ? 'display-none' : '' }}" id="step-1">   
            @forelse ($services as $service)

          <hr class="my-2 text-white">
          <div class="row row1 text-center pb-1 text-white  ">


            <div class="col-2">
                <img src="{{asset('storage/'.$service->image)}}">
            </div>
            <div class="col-4  text-end ">
                <div>
                    <h5>{{$service->name}}</h5>
                </div>
            </div>
           <div class="col-2">
            
             
               <div class="input-group w-auto justify-content-end align-items-center">
                  <button class="button-plus border rounded-circle icon-shape icon-sm " wire:click="increment({{$service->id}})">+</button>
                  <input wire:model="quantity.{{$service->id}}" 
                               class="text-sm sm:text-base px-2 pr-2 rounded-lg border border-gray-400 py-1 focus:outline-none focus:border-blue-400"
                               style="width:30px"/>
                  <button class="button-plus border rounded-circle icon-shape icon-sm " wire:click="decrease({{$service->id}})">-</button>
               </div>
           
         </div>
        
        <div class="col-2 ">
            <h6>{{$service->price}}</h6>
        </div>
        <div class="col-2 ">
            @if($cart->where('id', $service->id)->count())
            <button type="button" class="btn  " wire:click="removeFromCart({{$service->id}})">ازالـة</button>
            @else
            <button type="button" class="btn  " wire:click="addToCart({{$service}})">اضافه</button>
            @endif
        </div>

    </div>
    @empty
        
    @endforelse
   
    <div class="text-center  pt-4">
        <button type="button" class="btn  " wire:click="fristStepSubmit">التالي</button>
    </div>

    </div>

    <div class="row setup-content {{ $Steps != 2 ? 'display-none' : '' }}" id="step-2" >
        <div class="row pb-4 pt-2 " style=" flex-direction:row-reverse;">
            <div class="col  text-white d-inline-flex justify-content-end">
               
    
            </div>
            <div class="col-md-8 col-5">
    
            </div>
            <div class="col  text-white d-inline-flex justify-content-center">
                
            </div>
        </div>




        <div class="container" >
            
            <div class="col-3 position-relative ms-auto me-4  text-end  " style="color: rgb(238, 255, 0);">
                <h5>التاريخ</h5>
           </div>
           
            <div class="col-2 position-relative ms-auto me-4 pe-2 text-end text-white ">
                <div class="row">
                    <div class=" col-sm-12" >
                        <input type="date" name="date" wire:model="date">
                    </div>
                </div>
            </div>

            <div class="col-5 position-relative ms-auto me-4 mt-3  text-end  " style="color: rgb(238, 255, 0);">
                <h5> حدد الفترة الزمنيه  </h5>
            </div>

            <div class="col-10 position-relative ms-auto me-4 text-end text-white ">
                <hr class=" mb-3 " style=" height: 0.15rem  ;">
            </div>

            <div class=" position-relative ms-auto me-4 mb-5  pb-3 text-end  ">
                
                
                <div class="row-date row text-center mx-5 me-0">
                      
                    <div class="col-md-2 col-4 my-1 px-2">
                        <div type="button" class="buttonT cell py-1" wire:click="$set('time','9:50AM')">9:50AM</div>
                    </div>
                    
                    <div class="col-md-2 col-4 my-1 px-2">
                        <button  class="btn-primary buttonT cell py-1"wire:click="$set('time','10:00AM')">10:00AM</button>
                    </div>
                    
                    <div class="col-md-2 col-4 my-1 px-2">
                        <div class="buttonT cell py-1">9:30AM</div>
                    </div>
                    
                    <div class="col-md-2 col-4 my-1 px-2">
                        <div  class="buttonT cell py-1">9:30AM</div>
                    </div>
                    
                    <div class="col-md-2 col-4 my-1 px-2">
                        <div  class="buttonT cell py-1">9:30AM</div>
                    </div>
                    
                    <div class="col-md-2 col-4 my-1 px-2">
                        <div  class="buttonT cell py-1">9:30AM</div>
                    </div>
                    
                    
                    <div class="col-md-2 col-4 my-1 px-2">
                        <div  class="buttonT cell py-1">9:30AM</div>
                    </div>
                    
                    
                    <div class="col-md-2 col-4 my-1 px-2">
                        <div  class="buttonT cell py-1">9:30AM</div>
                    </div>
                    
                    
                    <div class="col-md-2 col-4 my-1 px-2">
                        <div  class="buttonT cell py-1">9:30AM</div>
                    </div>
            

            </div>     
       </div>
            <div class="text-center  pt-4">
                <button type="submit" class="btn  " wire:click="secondStepSubmit"> التالي </button>
            </div>
            <div class="text-center  pt-4">
                <button type="submit" class="btn  " wire:click="back"> الخلف </button>
            </div>
           
        <br>

        
        </div>
        
    </div>



    <div class="row setup-content {{ $Steps != 3 ? 'display-none' : '' }}" id="step-3">

        


        <div class=" position-relative ms-auto me-2 mb-1  pb-1 text-end  ">

            <div class=" row row-date text-white me-2 ">
                <div class="col-md-3  col-4 ms-1 pt-1 pb-1   "
                    style=" background-color: rgb(0, 0, 0);  border:rgb(255, 255, 255) solid 1px">
                    @foreach($cart as $item)
                        <h6>{{$item->name}}</h6>
                    
                    @endforeach
                </div>
                <div class="col-md-1 col-2 ms-1 pt-1 pb-1 "
                    style=" background-color: rgb(0, 0, 0);  border:rgb(255, 255, 255) solid 1px">
                    <h6>{{$date}}</h6>
                </div>
                <div class="col-md-1 col-2 ms-1 pt-1 pb-1  "
                    style="border-radius: 5px; border:aqua solid 1px ;background-color: rgb(0, 0, 0);">
                    <h6> {{$time}} </h6>
                </div>


            </div>

        </div>
        
        <div class="row-date me-2">
            <div class="col-3 position-relative ms-auto me-4 pe-3 text-end text-white ">
                <div class="col-md-2  col-2 ms-2 pt-1 pb-1 ">
                    <select wire:model="city">
                      <option >صنعاء</option>
                      <option >تعز</option>
                      <option >اييب</option>
                      <option >ذمار</option>
                      <option >عدن</option>
                    </select>
                  </div>

                  <div class="col-md-2  col-2 ms-2 pt-1 pb-1 ">
                    <select wire:model="state">
                      <option value="السنينة">السنينة</option>
                      <option value="حدة">حدة</option>
                      <option value="مذبح">مذبح</option>
                      <option value="شميلة">شميلة</option>
                      <option value="الحصبة">الحصبة</option>
                    </select>
                  </div>
           </div>

        </div>
        <div class="col-3 position-relative ms-auto me-4 pe-3 text-end text-white ">
            
       </div>

       
        <div class="row row-date me-2">


            <div class="col-6   text-end  " style="color: rgb(238, 255, 0);">
                <h5> وصف الخدمة </h5>
            </div>
            <div class="col-3   text-end  " style="color: rgb(238, 255, 0);">
                <h5>
                    اضافه صوره </h5>


            </div>

        </div>


        <div class="row row-date me-2">


            <div class="col-6   text-end  " style="color: rgb(238, 255, 0);">

                <textarea name="notes" wire:model="note" placeholder="ملاحظات..."
                    style=" overflow-wrap: break-word; resize: horizontal;"></textarea>

            </div>
            <div class="col-3   text-end  " style="color: rgb(238, 255, 0);">
                <button type="button" class="btn  ">صوره</button>

            </div>

        </div>

        <div class="col-3 position-relative ms-auto me-4  text-end  " style="color: rgb(238, 255, 0);">
            <h5>
                طريقة الدفع </h5>

        </div>
        <div class=" position-relative ms-auto me-4 mb-1  pb-1 text-end  ">

            <div class=" row row-date text-white me-2 ">
                <div class="col-md-2  col-2 ms-2 pt-1 pb-1 ">
                    <select>
                    <option> cash </option>
                    <option>Paypal </option>
                    <option> Appel pay</option>
                    </select>
                </div>
            </div>

        </div>

        <div class="text-center  pt-4 pb-5">
            <button type="button" class="btn " wire:click="time_select"> البحث عن مزود خدمة </button>
        </div>
        <div class="text-center  pt-4 pb-5">
            <button type="button" class="btn " wire:click="back"> الخلف </button>
        </div>


    </div>



           
    </div>



</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.js"></script>

<script>
    $(document).ready(function () {
        
    $('.cell').click(function () {
        $('.cell').removeClass('select');
        $(this).addClass('select');
    });
    
    });
    </script>
    
</div>

