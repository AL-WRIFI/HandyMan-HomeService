@extends('admin.layouts.master')

@section('title','Orders List')

@push('css_or_js')

@endpush

@section('content')
    <!-- Filter Aside -->
   
    <!-- End Filter Aside -->

    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-wrap mb-3">
                        <h2 class="page-title">الطلبات الجديدة</h2>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="data-table-top d-flex flex-wrap gap-10 justify-content-between">

                                <form action=""
                                      class="search-form search-form_style-two"
                                      method="POST">
                                    @csrf
                                    <div class="input-group search-form__input_group">
                                            <span class="search-form__icon">
                                                <span class="material-icons">search</span>
                                            </span>
                                        <input type="search" class="theme-input-style search-form__input"
                                               value="{{$query_param['search']??''}}" name="search"
                                               placeholder="ابحث هنا">
                                    </div>
                                    <button type="submit"
                                            class="btn btn--primary">البحث</button>
                                </form>

                            
                            </div>

                            <div class="table-responsive">
                                <table id="example" class="table align-middle">
                                    <thead class="text-nowrap">
                                        <tr>
                                            <th>رقم الطلب</th>
                                            <th>معلومات العميل</th>
                                            <th>مزود الخدمة</th>
                                            <th>التكلفة</th>
                                            <th>تاريخ/وقت الزيارة</th>
                                            <th>تاريخ الانشاء</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $key=>$order)
                                        <tr>
                                            <td>
                                                <a href="">
                                                    {{$order->number}}</a>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <h5 class="mb-1">{{Str::limit($order->user->name, 30 ?? '')}}</h5>
                                                    {{$order->user->phone ?? ''}}
                                                    {{$order->user->email ?? ''}}
                                                </div>
                                            </td>
                                            <td>
                                                {{$order->handyman->name ?? ''}}
                                            </td>
                                            <td>{{$order->total_cost}}</td>
                                            
                                            <td>{{$order->dateTimeService}}</td>
                                            <td>{{date('d-M-Y h:ia',strtotime($order->created_at))}}</td>
                                            <td>
                                                <div class="table-actions">
                                                    <a href="{{route('order.details', [$order])}}"
                                                       type="button"
                                                       class="table-actions_view btn btn--light-primary fw-medium text-capitalize fz-14">
                                                        <span class="material-icons ">visibility</span>
                                                        التفاصيل
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-end">
                                {!! $orders->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Content -->
@endsection

@push('script')
    <script>
        (function ($) {
            "use strict";

            //Select 2
            $('.category-select').select2({
                placeholder: "Select Category"
            });
            $('.subcategory-select').select2({
                placeholder: "Select Subcategory"
            });
            $('.zone-select').select2({
                placeholder: "Select Zone"
            })

        })(jQuery);
    </script>
@endpush
