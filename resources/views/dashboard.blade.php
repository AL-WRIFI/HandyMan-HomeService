@extends('admin.layouts.master')

@section('title','Dashboard')

@push('css_or_js')

@endpush


@section('content')
    <div class="main-content">
        <div class="container-fluid">
                <div class="row mb-4 g-4">
                    <div class="col-lg-3 col-sm-6">
                        <!-- Business Summary -->
                        <div class="business-summary business-summary-earning">
                            <h2>{{$data[0]['top_cards']['totalorders']}}</h2>
                            <h3>مجموع الطلبات</h3>
                            <img src="{{asset('public/assets/admin-module')}}/img/icons/total-earning.png"
                                 class="absolute-img" alt="">
                        </div>
                        <!-- End Business Summary -->
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <!-- Business Summary -->
                        <div class="business-summary business-summary-customers">
                            <h2>{{$data[0]['top_cards']['totalOrdersCompleted']}}</h2>
                            <h3>الطلبات المكتملة</h3>
                            <img src="{{asset('public/assets/admin-module')}}/img/icons/customers.png"
                                 class="absolute-img"
                                 alt="">
                        </div>
                        <!-- End Business Summary -->
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <!-- Business Summary -->
                        <div class="business-summary business-summary-providers">
                            <h2>{{$data[0]['top_cards']['total_customer']}}</h2>
                            <h3>العملاء</h3>
                            <img src="{{asset('public/assets/admin-module')}}/img/icons/providers.png"
                                 class="absolute-img"
                                 alt="">
                        </div>
                        <!-- End Business Summary -->
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <!-- Business Summary -->
                        <div class="business-summary business-summary-services">
                            <h2>{{$data[0]['top_cards']['total_handyman']}}</h2>
                            <h3>المزودين</h3>
                            <img src="{{asset('public/assets/admin-module')}}/img/icons/services.png"
                                 class="absolute-img"
                                 alt="">
                        </div>
                        <!-- End Business Summary -->
                    </div>
                   
                </div>
                <div class="row g-4">
                    
                    <!-- <div class="col-lg-3 col-sm-6">
                      
                        <div class="card recent-transactions h-100">
                            <div class="card-body">
                                <h4 class="mb-3">Recent Orders</h4>
                                <div class="d-flex align-items-center gap-3 mb-4">
                                    <img src="{{asset('public/assets/admin-module')}}/img/icons/arrow-up.png" alt="">
                                    <p class="opacity-75">ال</p>
                                </div>
                                <div class="events">
                                    @foreach($data[1]['orders'] as $order)
                                        <div class="event">
                                            <div class="knob"></div>
                                            <div class="title">
                                             <h5>{{$order->status}}</h5> 
                                            </div>
                                            <div class="description">
                                                <p>{{date('d M H:i a',strtotime($order->created_at))}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="line"></div>
                                </div>
                            </div>
                        </div>
      
                    </div> -->
                    
                    <div class="col-lg-5 col-sm-6">
                        <!-- Top Providers -->
                        <div class="card recent-activities">
                            <div class="card-header d-flex justify-content-between gap-10">
                                <h4>الطلبات الحديثة</h4>
                                <a href="" class="btn-link">الكل</a>
                               
                            </div>
                            <div class="card-body">
                                <ul class="common-list">
                                    @foreach($data[1]['orders'] as $order)
                                        <li class="d-flex flex-wrap gap-2 align-items-center justify-content-between"
                                            onclick="location.href=''" style="cursor: pointer">
                                            <div class="media align-items-center gap-3">
                                                <div class="avatar avatar-lg">
                                                    <img class="avatar-img rounded"
                                                         src="{{asset('storage/'.$order->category->image)}}"
                                                         onerror=""
                                                         alt="">
                                                </div>
                                                <div class="media-body ">
                                                    <h5>Order# {{$order->number}}</h5>
                                                    <p>{{date('d-m-Y, H:i a',strtotime($order->created_at))}}</p>
                                                </div>
                                            </div>
                                            <span
                                                class="badge rounded-pill py-2 px-3 badge-primary text-capitalize">{{$order->status}}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
              
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <!-- Top Providers -->
                        <div class="card top-providers">
                            <div class="card-header d-flex justify-content-between gap-10">
                                <h5>افصل المزودين</h5>
                                <a href="" class="btn-link">الكل</a>
                            </div>
                            <div class="card-body">
                                <ul class="common-list">
                                    @foreach($data[2]['top_handymans'] as $handyman)
                                        <li onclick="location.href='?web_page=overview'">
                                            <div class="media gap-3">
                                                <div class="avatar avatar-lg">
                                                    <img class="avatar-img rounded-circle"
                                                         onerror=""
                                                         src="{{asset('storage/'.$handyman->image)}}"
                                                         alt="">
                                                </div>
                                                <div class="media-body ">
                                                    <h5>{{\Illuminate\Support\Str::limit($handyman->name,20)}}</h5>
                                                    <span class="common-list_rating d-flex gap-1">
                                                        <span class="material-icons">star</span>
                                                        {{$handyman->avg_rating}}
                                                    </span>                                                 
                                                    <span class="common-list_success-rate">عددالتقييمات({{$handyman->ratingCount()}})</span>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- End Top Providers -->
                    </div>
                    <!-- <div class="col-lg-3 col-sm-6">
                  
                        <div class="card top-providers">
                            <div class="card-header d-flex flex-column gap-10">
                                <h5>booking_statistics - {{date('M, Y')}}</h5>
                            </div>
                            <div class="card-body" style="height: 392px;overflow-y: scroll;">
                                <ul class="common-list after-none gap-10 d-flex flex-column">
                                    @foreach($data[1]['orders'] as $order)
                                        <li>
                                            <div
                                                class="mb-2 d-flex align-items-center justify-content-between gap-10 flex-wrap">
                                                <span class="zone-name">{{$order->address}}</span>
                                                <span class="booking-count">{{$order->total_cost}}</span>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: {{$order->total_cost}}%" aria-valuenow="{{$order->total_cost}}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                       
                    </div> -->
                </div>
            
                <!-- <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-center">
                                    'welcome_to_admin_panel'
                                </h3>
                            </div>
                        </div>
                    </div>
                </div> -->
           
        </div>
    </div>
@endsection

@push('script')
    <script src="{{asset('public/assets/admin-module')}}/plugins/apex/apexcharts.min.js"></script>
    <script>
        var options = {
            series: [
                {
                    name: "total_earnings",
                    data: {{json_encode($data[1]['orders'])}}
                },
                {
                    name: "admin_commission",
                    data: {{json_encode($data[1]['orders'])}}
                }
            ],
            chart: {
                height: 386,
                type: 'line',
                dropShadow: {
                    enabled: true,
                    color: '#000',
                    top: 18,
                    left: 7,
                    blur: 10,
                    opacity: 0.2
                },
                toolbar: {
                    show: false
                }
            },
            yaxis: {
                labels: {
                    offsetX: 0,
                    formatter: function(value) {
                        var val = Math.abs(value)
                        if (val >= 10000000000000) {
                            val = (val / 10000000000000).toFixed(0) + ' T'
                        } else if (val >= 10000000000) {
                            val = (val / 10000000000).toFixed(0) + ' B'
                        } else if (val >= 1000000) {
                            val = (val / 1000000).toFixed(0) + ' M'
                        } else if (val >= 1000) {
                            val = (val / 1000).toFixed(0) + ' K'
                        }
                        return val
                    }
                },
            },
            colors: ['#4FA7FF', '#82C662'],
            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: 'smooth',
            },
            grid: {
                xaxis: {
                    lines: {
                        show: true
                    }
                },
                yaxis: {
                    lines: {
                        show: true
                    }
                },
                borderColor: '#CAD2FF',
                strokeDashArray: 5,
            },
            markers: {
                size: 1
            },
            theme: {
                mode: 'light',
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            legend: {
                position: 'bottom',
                horizontalAlign: 'center',
                floating: false,
                offsetY: -10,
                offsetX: 0,
                itemMargin: {
                    horizontal: 10,
                    vertical: 10
                },
            },
            padding: {
                top: 0,
                right: 0,
                bottom: 200,
                left: 10
            },
        };

        if (localStorage.getItem('dir') === 'rtl') {
            options.yaxis.labels.offsetX = -20;
        }


        var chart = new ApexCharts(document.querySelector("#apex_line-chart"), options);
        chart.render();

        function update_chart(year) {
            var url =  year;

            $.getJSON(url, function (response) {
                chart.updateSeries([{
                    name: "total_earnings",
                    data: response[0].earning_stats
                }, {
                    name: "admin_commission",
                    data: response[0].commission_stats
                }])
            });
        }
    </script>
@endpush
