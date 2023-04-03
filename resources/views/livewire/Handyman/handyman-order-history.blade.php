<div>
    <div class="maincont">
        <div class="serv-myorder pt-2 p-0 container " >



            <div class=" row py-4 row-cols-1 provader-order " style="justify-content:flex-end;">

                @foreach($orders as $order)
                <!-- start order provaider-->
                <!-- 1-->

                    <div class="col col-lg-10 px-lg-2 provider-order  ">

                        <div class="my-order py-1 py-md-3 mb-2 px-1 px-md-2 px-lg-3">

                            <div class=" col row row1 p-0 m-0" >
                                <div class="col-5 px-1 m-0 " style="
                                                ">

                                    <div
                                        style="margin-top: 21px;display: flex;align-items: center;flex-direction: row-reverse;">
                                        <div style="/* padding: 0 5px; */">
                                            @if($order->user->image)
                                            <img class="serv-img" src="{{asset('storage/'.$order->user->image)}}"
                                                style="display: inline;margin-right: 0;margin-left: auto;" >
                                            @else
                                            <img class="serv-img" src="{{asset('assets/img/user1.png')}}"
                                            style="display: inline;margin-right: 0;margin-left: auto;" >
                                            @endif
                                        </div>

                                        <div class=" px-1 me-1 me-md-3 ms-auto pt-2 text-end">
                                            <h5 style="font-size: 14px;padding: 0;margin: 0;">{{$order->user->name}}
                                            </h5>
                                            <h5 style="font-size: 14px;padding: 0;margin: 0;color: #59524c;">
                                                {{$order->user->phone}}</h5>
                                            <h5 style="font-size: 14px;padding: 0;margin: 0;color: #59524c;">
                                                {{$order->city->name.','.$order->zone->name}}
                                            </h5>


                                        </div>

                                    </div>

                                    <div class="row" style="
                                flex-direction: row-reverse;">
                                        <div class="col"
                                            style=" display: flex;align-content: center;flex-wrap: wrap; justify-content: flex-end;">
                                            <h5
                                                style="font-size: 14px;padding: 0;margin: 0;text-align: end;padding-right: 7px;color: #59524c;margin-bottom: auto;margin-top: auto;">
                                                ملاحظة</h5>
                                        </div>
                                        <div class="col">
{{-- <x-heroicon-o-camera style="display: block;width:25px;height: 25px;color: #4a4af9;padding-left: 7px;" /> --}}

                                                       {{-- <svg
                                                style="display: block;width:25px;height: 25px;color: #4a4af9;padding-left: 7px;"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z">
                                                </path>
                                            </svg> --}}
                                        </div>
                                    </div>






                                    <div
                                        style="  width: 95%; background-color: #f9f9f936;height: 55px; border: 0.3px solid #bfbfbf;border-radius: 3px;  padding: 5px;margin: 5px; margin-top: 0px; ">
                                        <h5
                                            style="font-size: 13px;padding: 0;margin: 0;text-align: end;color: #59524c;">
                                            {{$order->note}}
                                        </h5>
                                    </div>

                                </div>







                                <div class="col-7 py-1 m-0" style="    border-right: 0.5px solid #bab4b4;">

                                    <div class="row">



                                        <div class="col">
                                            <h5 style="text-align: start;font-weight: bolder;color: #0d8bff;">
                                                {{$order->created_at->format('d/m/y')}}</h5>
                                        </div>
                                        <div class="col">
                                            <h5 style="text-align: end;font-weight: 600;color: #424242;">
                                                {{$order->category->name}}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="row" style="    flex-direction: row-reverse;">





                                        <div class="col-10 ps-0 ">
                                            <div
                                                style="display: flex;flex-direction: row-reverse;justify-content: flex-start;">
                                                <h5 style="font-size: 14px;color: #302d2d;margin: 0;">تفاصيل الطلب</h5>
                                                <button data-bs-toggle="collapse"
                                                    data-bs-target="{{'#demo'.$order->id}}" class="collapsed"
                                                    aria-expanded="false"
                                                    style="  margin: 0 7px; padding: 0; border: 0; width: fit-content; background-color: white;">
{{--
                                                    <x-heroicon-s-arrow-down-circle
                                                        style="display: block;width:21px; height: 21px;  color: #ffffff; background-color: #000; border-radius: 61px;  " />
                                                    --}}

                                                        {{-- <svg
                                                        style="display: block;width:21px; height: 21px;  color: #ffffff; background-color: #000; border-radius: 61px;  "
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-11.25a.75.75 0 00-1.5 0v4.59L7.3 9.24a.75.75 0 00-1.1 1.02l3.25 3.5a.75.75 0 001.1 0l3.25-3.5a.75.75 0 10-1.1-1.02l-1.95 2.1V6.75z"
                                                            clip-rule="evenodd"></path>
                                                    </svg> --}}


                                                </button>
                                            </div>



                                            <div id="{{'demo'.$order->id}}" class="mt-1 collapse"
                                                style="text-align: end; margin-right: 12px; margin-top: -9px; background-color: white;">
                                                @foreach($order->detail as $itme)
                                                <span
                                                    style="display: inline-block;margin: 0;padding: 0;border-bottom: 5px solid white;border-top: 5px solid  white;border-left: 5px solid white;border-right: 5px solid  #21088f;"></span>
                                                <h5 style="font-size: 13px;color: #21088f;display: inline-block;"> {{
                                                    $itme->service->name }}
                                                    </h5>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>


                                    <div class="row" style="    flex-direction: row-reverse;">
                                        <div class="col "
                                            style=" display: flex; align-items: center; justify-content: flex-end;">
                                            <h5 class="text-center p-0 m-0" style=" color: #444546;font-size: 14px; ">
                                                تاريخ
                                                الزيارة</h5>
                                                
                                        </div>
                                        
                                        <div class="col pe-0"
                                            style="display: flex;justify-content: flex-start;align-items: center;">

                                            <div class="" style="">
                                                <i class="w3-large bi bi-currency-exchange icone "
                                                    style=" color: #2fb62f;"></i>
                                           
                                            </div>


                                            <div class="" style="">
                                                <h5 style=" margin: 0px 5px;color: rgb(7, 190, 47);font-size: 25px; padding: 0;">
                                                   <strong> {{$order->total_cost}} </strong>
                                                </h5>
                                            </div>

                                        </div>

                                    </div>





                                    <div class="row py-1" style="    flex-direction: row-reverse;">
                                        <div class="col-4 col-md-4 col-lg-3 p-0  my-1">
                                            <div
                                                style="background-color: #f8f9f9;text-align: center;width: 85%;margin-right: auto;margin-left: auto;border: 0;border-radius: 2px;">
                                                <h5 style=" margin: 0; font-size: 14px;">
                                                    {{$order->dateTimeService}}
                                                </h5>
                                            </div>
                                        </div>
                                        {{-- <div class="col-4 col-md-4 col-lg-3 p-0 my-1 ">
                                            <div
                                                style="background-color: #f8f9f9;text-align: center;width: 83%;margin-right: auto;margin-left: auto;border: 0;border-radius: 2px;">
                                                <h5 style="margin: 0;font-size: 14px;">
                                                    {{$order->service_time}}
                                                </h5>

                                            </div>
                                        </div> --}}




                                    </div>
                                    <div class="row px-2" style="box-sizing: border-box;">
                                    
                                        <button class="col-5 col-md-3 p-0  btn  btn-sm" style="background-color: #c9c8c8"> تم التنفيذ </button>
                                    </div>

                                </div>





                            </div>

                        </div>


                    </div>



                @endforeach

                <!-- 2-->

                <!-- end order provaider-->





            </div>


        </div>
    </div>

</div>
