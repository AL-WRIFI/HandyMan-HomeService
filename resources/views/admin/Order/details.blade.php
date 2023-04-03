@extends("admin.layouts.master")

@section("title","تفاصيل الطلب")
@push("css_or_js")

@endpush

@section("content")
    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-wrap mb-3">
                        <h2 class="page-title">تفاصيل الطلب </h2>
                    </div>

                    <ul class="nav nav--tabs nav--tabs__style2 mb-4">
                        <li class="nav-item">
                            <a class="nav-link {{'details'?'active':''}}"
                               href="">details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{'status'?'active':''}}"
                               href="">status</a>
                        </li>
                    </ul>

                    <div class="card mb-3">
                        <div class="card-body pb-5">
                            <div
                                class="border-bottom pb-3 d-flex justify-content-between align-items-center gap-3 flex-wrap">
                                <div>
                                    <h3 class="c1 mb-2">الطلب
                                        # {{$order->number}}</h3>
                                    <p class="opacity-75 fz-12">تاريخ الطلب
                                        : {{date('d-M-Y h:ia',strtotime($order->created_at))}}</p>
                                </div>
                                <div class="d-flex flex-wrap flex-xxl-nowrap gap-3">
                                    <select class="js-select theme-input-style max-w220 min-w180 selected-item-c1"
                                            id="serviceman_assign">
                                        <option value="no_serviceman">المزود</option>
                                        
                                    </select>
                                    
                                    @if($order->status != "pending")
                                        <select class="js-select theme-input-style max-w220 min-w180 selected-item-c1"
                                                id="booking_status">
                                            <option value="0">---حالة الطلب------</option>
                                            <option
                                                value="ongoing" {{$order['status'] == 'ongoing' ? 'selected' : ''}}>Ongoing</option>
                                            <option
                                                value="completed" {{$order['status'] == 'completed' ? 'selected' : ''}}>Completed</option>
                                            <option
                                                value="canceled" {{$order['status'] == 'canceled' ? 'selected' : ''}}>Canceled</option>
                                        </select>
                                    @endif

                                    @if(!in_array($order->status,["ongoing","completed"]))
                                        <button type="button" class="btn btn--primary" data-bs-toggle="modal"
                                                id="change_schedule"
                                                data-bs-target="#changeScheduleModal">
                                            <span class="material-icons">schedule</span>
                                            CHANGE_SCHEDULE
                                        </button>
                                    @endif

                                    <a href=""
                                       class="btn btn-primary" target="_blank">
                                        <span class="material-icons">description</span>
                                        Invoice
                                    </a>
                                </div>
                            </div>
                            <div
                                class="border-bottom py-3 d-flex justify-content-between align-items-center gap-3 flex-wrap">
                                <div>
                                    <h4 class="mb-2">Payment_Method</h4>
                                    <h5 class="c1 mb-2">$order->payment_method</h5>
                                    <p>
                                        <span>التكلفة : </span> {{$order->total_cost}}
                                    </p>
                                </div>
                                <div>
                                    <p class="mb-2"><span>حالةالطلب :</span> <span
                                            class="c1"
                                            id="booking_status__span">{{$order->status}}</span></p>
                                    <p class="mb-2"><span>Payment_Status : </span> <span
                                            class="text-{{$booking->is_paid ? 'success' : 'danger'}}"
                                            id="payment_status__span">DXYTVGh</span>
                                    </p>
                                    <h5>تاريخ الزيارة : <span
                                            id="service_schedule__span">{{date('d-M-Y h:ia',strtotime($order->service_data.'|'.$order->service_time))}}</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="py-3 d-flex gap-3 flex-wrap mb-2">
                                <!-- Customer Info -->
                                <div class="c1-light-bg radius-10 py-3 px-4 flex-grow-1">
                                    <h4 class="mb-2">معلومات العميل</h4>
                                    <h5 class="c1 mb-3">{{isset($order->user)?Str::limit($order->user->name. ' ' .$order->user->name, 30):''}}</h5>
                                    <ul class="list-info">
                                        <li>
                                            <span class="material-icons">phone_iphone</span>
                                            <a href="tel:88013756987564">{{isset($order->user)?$order->user->phone:''}}</a>
                                        </li>
                                        <li>
                                            <span class="material-icons">map</span>
                                            <p>{{Str::limit($order->address->address?? 'not_available , 100)}}</p>
                                        </li>
                                    </ul>
                                </div>
                                <!-- End Customer Info -->

                                <!-- Provider Info -->
                                <div class="c1-light-bg radius-10 py-3 px-4 flex-grow-1">
                                    <h4 class="mb-2">معلومات المزود</h4>
                                    <h5 class="c1 mb-3">{{Str::limit($order->handyman->name)}}</h5>
                                    <ul class="list-info">
                                        <li>
                                            <span class="material-icons">phone_iphone</span>
                                            <a href="tel:88013756987564">{{$order->handyman->phone}}</a>
                                        </li>
                                        <li>
                                            <span class="material-icons">map</span>
                                            <p>{{Str::limit($order->handyman->address)}}</p>
                                        </li>
                                    </ul>
                                </div>
                                <!-- End Provider Info -->

                                <!-- Lead Service Info -->
                                <div class="c1-light-bg radius-10 py-3 px-4 flex-grow-1">
                                    <h4 class="mb-2">Lead_Service_Information</h4>
                                    <h5 class="c1 mb-3">{{Str::limit($order->handyman  ? $order->handyman->name)}}</h5>
                                    <ul class="list-info">
                                        <li>
                                            <span class="material-icons">phone_iphone</span>
                                            <a href="">
                                                {{$order->handyman  ? $order->handyman->phone}}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- End Lead Service Info -->
                            </div>
                            <h3 class="mb-3">Booking Summary</h3>
                            <div class="table-responsive border-bottom">
                                <table class="table text-nowrap align-middle mb-0">
                                    <thead>
                                    <tr>
                                        <th class="ps-lg-3">الخدمة</th>
                                        <th>السعر</th>
                                        <th>الكمية</th>
                                        <th>الخصم</th>
                                        <th class="text-end">المجموع</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($sub_total=0)
                                    @foreach($order->detail as $detail)
                                        <tr>
                                            <td class="text-wrap ps-lg-3">
                                                <div class="d-flex flex-column">
                                                    <a href=""
                                                       class="fw-bold">{{Str::limit($detail->service->name, 30)}}</a>
                                                    <div>{{Str::limit($detail ? $detail->->service->name , 50)}}</div>
                                                </div>
                                            </td>
                                            <td>{{$detail->service->price}}</td>
                                            <td>{{$detail->service->quantity}}</td>
                                            <td>{{$detail->service->price}}</td>
                                            <td class="text-end">{{$detail->service->total_cost}}</td>
                                        </tr>
                                        @php($sub_total+=$detail->service_cost*$detail->service->quantity)
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row justify-content-end mt-3">
                                <div class="col-sm-10 col-md-6 col-xl-5">
                                    <div class="table-responsive">
                                        <table class="table-sm title-color align-right w-100">
                                            <tbody>
                                            <tr>
                                                <td>Sub_Total_</td>
                                                <td>{{$sub_total}}</td>
                                            </tr>
                                            <tr>
                                                <td>Discount</td>
                                                <td>{{$order->total_cost}}</td>
                                            </tr>
                                            <tr>
                                                <td>Coupon_Discount</td>
                                                <td>{{$order->total_cost}}</td>
                                            </tr>
                                            <tr>
                                                <td>Campaign_Discount</td>
                                                <td>{{$order->total_cost}}</td>
                                            </tr>
                                            <tr>
                                                <td>Vat</td>
                                                <td>{{$order->total_cost}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Grand_Total</strong></td>
                                                <td>
                                                    <strong>{{$order->total_cost}}</strong>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Content -->

    <!-- Modal -->
    <div class="modal fade" id="changeScheduleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="changeScheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changeScheduleModalLabel">Change_Booking_Schedule</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="datetime-local" id="service_schedule" class="form-control" name="service_schedule"
                           value="{{$order->service_time}}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--secondary"
                            data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn--primary"
                            id="service_schedule__submit">Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection


