<div>
    <div class="maincont">
        <div class="serv-myorder pt-2 p-0 container " style="height: 800px;">



            <div class=" row py-2 row-cols-1 provader-order ">

                @foreach($orders as $order)
                <!-- start order provaider-->
                <!-- 1-->
                <div class="col">

                    <div class="my-order py-0 py-md-3 mb-2">

                        <div class=" col row row1 p-0 m-0">
                            <div class="col-5 p-0 m-0 ">

                                <div
                                    style="margin-top: 21px; display: flex; align-items: center; flex-direction: row-reverse;">
                                    <div style="
                                    padding: 0 5px;
                                ">
                                        <img class="serv-img" src="http://127.0.0.1:8000/assets/img/user.png"
                                            style="display: inline; margin-right: 0;margin-left: auto;">

                                    </div>

                                    <div class="">
                                        <h5 style="font-size: smaller;padding: 0;margin: 0;">{{$order->user->name}}
                                        </h5>
                                        <h5 style="font-size: smaller;padding: 0;margin: 0;">
                                            {{$order->user->phone_number}} </h5>
                                        <h5 style="font-size: smaller;padding: 0;margin: 0;"> {{$order->address}}
                                        </h5>
                                        <h5 style="font-size: smaller;padding: 0;margin: 0;">تم ارفاق صوره</h5>
                                    </div>

                                </div>
                                <h5 style="font-size: smaller;padding: 0;margin: 0;text-align: end;padding-right: 9px;">
                                    ملاحظة</h5>
                                <div style="
                            width: 94%;
                            background-color: #f9f9f9;
                            height: 55px;
                            border: 0.6px solid black;
                            border-radius: 5px;
                            padding: 5px;
                            margin: 5px;
                            margin-top: 3px;
                        "> {{$order->note}} </div>

                            </div>







                            <div class="col-7 py-1 m-0" style="    border-right: 0.5px solid #bab4b4;">

                                <div class="row">



                                    <div class="col">
                                        <h5 style="text-align: start; font-weight: bolder;">
                                            14:30</h5>
                                    </div>
                                    <div class="col">
                                        <h5 style="text-align: end; font-weight: bolder;">
                                            {{$order->category->name}}
                                        </h5>
                                    </div>
                                </div>
                                <div class="row" style="    flex-direction: row-reverse;">






                                    <div class="col-8 ps-0 ">
                                        <div style=" display: flex; flex-direction: row-reverse;">
                                            <span>تفاصيل الطلب</span>
                                            <button data-bs-toggle="collapse" data-bs-target="#demo2" class="collapsed"
                                                aria-haspopup="true" aria-expanded="false"
                                                style="  margin: 0; padding: 0; border: 0;width: fit-content;"><span>^</span></button>
                                        </div>



                                        <div id="demo2" class="collapse show mt-1"
                                            style="text-align: end;margin-right: 12px;    margin-top: -9px; background-color: white;">
                                            @foreach($order->detail as $itme)
                                            <h5 style="margin-right: 10px; font-size: small;"> {{
                                                $itme->service->name }}</h5>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>


                                <div class="row" style="    flex-direction: row-reverse;">
                                    <div class="col ">
                                        <h6 class="text-end p-0 m-0">تاريخ الزيارة</h6>
                                    </div>
                                    <div class="col pe-0" style=" display: flex; justify-content: space-around;">

                                        <div class="">
                                            <i class="w3-large bi bi-currency-exchange icone "></i>

                                        </div>


                                        <div class="">
                                            <h5>{{$order->total_cost}}</h5>
                                        </div>

                                    </div>

                                </div>





                                <div class="row  " style="    flex-direction: row-reverse;">
                                    <div class="col-5 col-md-4 col-lg-3 p-0  m-1">
                                        <div style="background-color: #f9f9f9; text-align: center;">
                                            {{$order->service_date}}</div>
                                    </div>
                                    <div class="col-5 col-md-4 col-lg-3 p-0 m-1 ">
                                        <div style="background-color: #f9f9f9; text-align: center;">
                                            {{$order->service_time}}
                                        </div>
                                    </div>




                                </div>
                                <div class="row ">
                                    <button class="col-5 col-md-3 p-0  btn btn-success btn-sm"
                                        wire:click="approvedOrder({{$order->id}})">قبول</button>
                                    <button class="col-5 col-md-3 p-0  btn btn-danger btn-sm"
                                        wire:click="rejectOrder({{$order->id}})">رفض</button>

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
