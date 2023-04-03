<div>

    @foreach($orders as $order)
    <div class="container-fluid my-5 d-sm-flex justify-content-center">
        <div class="card-o px-1 col-lg-6 mx-auto">
            <div class="card-header bg-white">
                <div class="row justify-content-between " style="text-align:end;">
                    <div class="col">
                        <p class="text-muted " style="margin-bottom: 3px;">
                            <span class="font-weight-bold text-dark">1222528743
                            </span> رقم الطلب
                        </p>

                        <p class="text-muted" style="margin-bottom: 5px;"> <span
                                class="font-weight-bold text-dark">{{$order->created_at}}</span>
                            تاريخ الانشاء </p>
                    </div>


                    <div class="container "
                        style="   border-radius: 3px; padding: 5px 15px; box-shadow: 0 1px 1px 0 rgb(0 0 0 / 14%), 0 1px 2px 0 rgb(0 0 0 / 12%), 0 1px 1px -2px rgb(0 0 0 / 20%);">

                       
                        <button data-bs-toggle="collapse" data-bs-target="{{'#a'.$order->id}}" class="collapsed"
                            aria-expanded="false"
                            style="margin: 0;padding: 0;border: 0;width: 100%; background-color:white">
                            <div style="display: flex;flex-direction: row-reverse;justify-content: space-between;">


                                <span style=" font-weight: 600; ">{{$order->category->name}}</span>

                                <span style=" font-weight: 600; ">
                                    < </span>
                            </div>
                        </button>



                        <div id="{{'a'.$order->id}}" class="mt-3 collapse"
                            style="text-align: end; margin-right: 12px; margin-top: -9px; background-color: white;">

                            @foreach($order->detail as $item)
                            <div class=" row px-3" style="flex-direction: row-reverse;">
                                <h5 class="col-10 col-md-10 col-lg-10  p-0 m-0"
                                    style="margin-right: 10px; font-size: small;">
                                    {{$item->service->name}}
                               </h5>
                                <h5 class="col-2 col-md-2 col-lg-2 p-1 m-0" style="margin-right: 10px;font-size: small;width: fit-content;background-color: #4880d8;
                                            color: white;border-radius: 50px;padding: 5px;text-align: center;
                                            height: fit-content;">
                                    {{$item->service->price}}
                                    <span class="small  text-white"> (YER) </span></h5>
                            </div>

                            <hr class="text-black" style="
                                        height: 0.25px;
                                        border: 0;

                                    ">
                            @endforeach        
                        </div>


                    </div>
                </div>
            </div>
            <div class="card-body" style="padding-top: 0;">
                <div class="media flex-row">
                    <div class="media-body " style="margin-top: 7%;">


                        <h5 class="mt-3 mb-2 bold"> {{$order->total_cost}}<span class="small text-muted"> (YER) </span>
                        </h5>
                        <p class="text-muted">تاريخ الزيارة : <span class="Today">{{$order->service_date.'|'.$order->service_time}}</span> </p>
                        <button type="text" class="btn" style="
                                                font-size: small;
                                                color: #ffffff;
                                                background-color: green;
                                                width: fit-content;
                                                padding: 3px;
                                                border: 0;
                                                border-radius: 5px;
                                                margin-bottom: 0.5rem;
                                                text-align:center;
                                                ">
                           {{$order->order_status}}
                        </button>
                    </div>
                    <div style="margin-top: 4%;text-align:end;">
                        <p class="text-muted"> :الفني </p>
                        <img class="align-self-center img-fluid"
                            src="{{asset('storage/'.$order->handyman->image)}}">
                        <h5 class="mt-1 mb-2 bold"><span class="small text-muted"> (سباك) </span> <span
                                class="mt-5"></span> {{$order->handyman->name}}
                        </h5>
                        <p class="text-muted"><span class="Today">{{$order->handyman->phone}}</span> : الهاتف</p>
                    </div>
                </div>
            </div>


        </div>
    </div>
    @endforeach




















    {{-- <script>
        Livewire.on('OrderStatusupdated', data => {
            @this.call('acscepted', data);
        });
    </script> --}}


</div>
{{-- <script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('orderApproved', function (orderId) {
            @this.refreshOrders(orderId);
        });
    });
</script> --}}
