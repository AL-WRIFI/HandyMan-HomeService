<div class="col-3 col-lg-2 d-flex p-0 m-0 pt-3" style="justify-content: space-around;"
               onclick="toggle_Notifi()">

                <img src="{{ asset('assets/svg/notifications-sharp.svg') }}" alt="" style="width: 20px;height: 20px;">


                <div class="notifi-box" id="boxn">
                    <h2>اشعارات<span></span></h2>

                    @if($orders != '')
                    @foreach($orders as $order)
                    <div class="notifi-item">
                        <img src="{{asset('assets/img/var.png')}}"  style="width: 10%; height:10%;" alt="img">
                        <div class="text">
                            <h4 style="font-size:100%">{{$order->user->name ?? ''}}</h4>
                            <h4 style="font-size:100%">{{$order->total_cost ?? ''}}</h4>
                            <p>{{$order->category->name ?? ''}}<br>
                            </p>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    {{-- <div class="notifi-item">
                        <img src="img/avatar1.png" alt="img">
                        <div class="text">
                            <h4>Elias Abdurrahman</h4>
                            <p>@lorem ipsum dolor sit amet</p>
                        </div>
                    </div> --}}
                </div>
 </div>