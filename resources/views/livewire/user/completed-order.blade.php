<div>
   
    @if(Auth::check())

    @foreach($orders as $order)

    <div class="container-fluid my-5 d-sm-flex justify-content-center">
      
        <div class="card-o px-1 col-md-8  col-lg-6 mx-auto">
            <div class="card-header bg-white">
                @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
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
                                    <span class="small  text-white"> (YER) </span>
                                </h5>
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
                        <p class="text-muted">تاريخ الزيارة : <span
                                class="Today">{{$order->dateTimeService}}</span> </p>
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
                                                " disabled>
                            تم تنفيذ الطلب
                        </button>
                    </div>
                    <div style="margin-top: 4%;text-align:end;">
                        <p class="text-muted"> :الفني </p>
                        <img class="align-self-center img-fluid" src="{{asset('storage/'.($order->handyman->image))}}" alt="">
                        <h5 class="mt-1 mb-2 bold"><span class="small text-muted"> (سباك) </span> <span
                                class="mt-5"></span> {{$order->handyman->name}}
                        </h5>
                        <p class="text-muted" style="margin: 0;"><span class="Today">{{$order->handyman->phone}}</span>
                            : الهاتف</p>
                    </div>
                </div>


                @if($order->status=='completed' && $existingRating[$order->id] == false )


                <div>
                    <div class="row" style="direction: rtl;">
                        <div class="col" style="text-align: start;">
                            <h5>تققيك ل <span>{{$order->handyman->name}}</span> <span> (-: </span></h5>
                        </div>
                        <div class="col" style=" text-align: start;">
                            <h5>ملاحظتك تحسن خدمتنا </h5>
                        </div>
                    </div>
                    <div class="row" style="direction: rtl;">
                        <div class="col" style="text-align: start;">

                            <div class="rate">
                                <input type="radio" id="star5" name="rate" value="5" wire:model="rating" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rate" value="4" wire:model="rating" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rate" value="3" wire:model="rating" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="2" wire:model="rating" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rate" value="1" wire:model="rating" />
                                <label for="star1" title="text">1 star</label>
                            </div>
                        </div>
                        <div class="col" style="text-align: start;">

                            <div class=" p-0  text-end  text-black"
                                style="justify-content: center;display: flex;align-content: center;flex-wrap: wrap;">

                                <textarea name="" wire:model="review" placeholder="تعليق..." style="
                                      width: 95%;
                                      background-color: #f9f9f936;height: 55px;
                                      border: 0.3px solid #bfbfbf;
                                      border-radius: 3px;
                                      padding: 5px;margin: 5px; margin-top: 0px; height: 40px;
                                      direction: rtl;
                                      font-size: 14px;"></textarea>

                           
                        </div>
                         </div>
                        </div>
                    </div>
                            <button type="text" class="btn" style="
                            font-size: small;
                            color: #ffffff;
                            background-color: rgb(3, 24, 211);
                            width: fit-content;
                            padding: 3px;
                            border: 0;
                            border-radius: 5px;
                            margin-bottom: 0.5rem;
                            text-align:center;
                            " wire:click="sendRating({{ $order->handyman->id }},{{$order->id}})" wire:loading.attr="disabled"
                              wire:target="sendRating" >
                          ارسال التقييم  
                         </button>
                @endif

            </div>


        </div>
    </div>
    @endforeach

    @else
<div class="container-fluid my-5 d-sm-flex justify-content-center">
<h1 style="font-size: 150%;padding: 0;margin: 0;color: #59524c; margin-top: 20%;" > يجب تسجيل الدخــول</h1>
</div>
@endif

</div>
{{-- @livewireScripts
<script>
    Livewire.on('orderApproved', function () {
        location.reload();
    });
</script> --}}

{{-- <script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('orderApproved', function (orderId) {
            @this.refreshOrders(orderId);
        });
    });
</script> --}}
@push('scripts')


<script>

    window.addEventListener('Rating',function(e){
        Swal.fire({
                title: e.detail.title,
                text: e.detail.text,
                icon: e.detail.icon,
                timer: 3000,
                showCancelButton: true,
                
            });
    });
      // Wire up the delete modal using SweetAlert2
      
</script>
@endpush