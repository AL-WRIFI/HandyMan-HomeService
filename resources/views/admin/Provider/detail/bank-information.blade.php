@extends('adminmodule::layouts.master')

@section('title',translate('provider_details'))

@push('css_or_js')


@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-title-wrap mb-3">
                <h2 class="page-title">{{translate('Bank_Information')}}</h2>
            </div>

            <!-- Nav Menu -->
            <div class="mb-3">
                <ul class="nav nav--tabs nav--tabs__style2">
                    <li class="nav-item">
                        <a class="nav-link {{$web_page=='overview'?'active':''}}"
                           href="{{url()->current()}}?web_page=overview">{{translate('Overview')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$web_page=='subscribed_services'?'active':''}}"
                           href="{{url()->current()}}?web_page=subscribed_services">{{translate('Subscribed_Services')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$web_page=='bookings'?'active':''}}"
                           href="{{url()->current()}}?web_page=bookings">{{translate('Bookings')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$web_page=='serviceman_list'?'active':''}}"
                           href="{{url()->current()}}?web_page=serviceman_list">{{translate('Service_Man_List')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$web_page=='settings'?'active':''}}"
                           href="{{url()->current()}}?web_page=settings">{{translate('Settings')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$web_page=='bank_information'?'active':''}}"
                           href="{{url()->current()}}?web_page=bank_information">{{translate('Bank_Information')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$web_page=='reviews'?'active':''}}"
                           href="{{url()->current()}}?web_page=reviews">{{translate('Reviews')}}</a>
                    </li>
                </ul>
            </div>
            <!-- End Nav Menu -->

            <div class="card">
                <!-- Card Header -->
                <div class="border-bottom d-flex gap-3 flex-wrap justify-content-between align-items-center px-4 py-3">
                    <div class="d-flex gap-2 align-items-center">
                        <span class="material-icons">account_balance</span>
                        <h3>{{translate('Bank_Information')}}</h3>
                    </div>
                    <div class="d-flex gap-2 align-items-center">
{{--                        <button type="button" class="btn btn--primary" data-bs-toggle="modal" data-bs-target="#updateBankInfo">--}}
{{--                            <span class="material-icons">edit_square</span>--}}
{{--                            {{translate('Update')}}--}}
{{--                        </button>--}}
{{--                        <button type="button" class="btn btn-danger"--}}
{{--                                onclick="route_alert_reload('{{route('admin.provider.account.delete',[$provider->id])}}','{{translate('want_to_delete_the_bank_information')}}', true)">--}}
{{--                            <span class="material-icons">delete</span>--}}
{{--                            {{translate('Delete')}}--}}
{{--                        </button>--}}
                    </div>
                </div>
                <!-- End Card Header -->
                <!-- Card Body -->
                <div class="card-body p-30">
                    <div class="row justify-content-center">
                        <div class="col-sm-6 col-md-8 col-lg-6 col-xl-5">
                            <!-- Bank Info Card -->
                            <div class="card bank-info-card bg-bottom bg-contain bg-img" style="background-image: url('{{asset('public/assets/admin-module')}}/img/media/bank-info-card-bg.png');">
                                <div class="border-bottom p-3">
                                    <h4 class="fw-semibold">{{translate('Holder_Name')}}: <strong>{{Str::limit($provider->bank_detail->acc_holder_name ?? translate('Unavailable'), 50)}}</strong></h4>
                                </div>
                                <div class="card-body position-relative">
                                    <img class="bank-card-img" src="{{asset('public/assets/admin-module')}}/img/media/bank-card.png" alt="">
                                    <ul class="list-unstyled d-flex flex-column gap-4">
                                        <li>
                                            <h3 class="mb-2">{{translate('Bank_Name')}}:</h3>
                                            <div>{{ $provider->bank_detail->bank_name ?? translate('Unavailable') }}</div>
                                        </li>
                                        <li>
                                            <h3 class="mb-2">{{translate('Branch_Name')}}:</h3>
                                            <div>{{ $provider->bank_detail->branch_name ?? translate('Unavailable') }}</div>
                                        </li>
                                        <li>
                                            <h3 class="mb-2">{{translate('Account_Number')}}:</h3>
                                            <div>{{ $provider->bank_detail->acc_no ?? translate('Unavailable') }}</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Bank Info Card -->
                        </div>
                    </div>
                </div>
                <!-- End Card Body -->
            </div>
        </div>
    </div>
    <!-- End Main Content -->

    <!-- Modal -->
    <div class="modal fade" id="updateBankInfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('admin.provider.account.update',[$provider->id])}}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="changeScheduleModalLabel">{{translate('Update_Account_Information')}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating mb-30">
                            <input type="text" class="form-control" name="bank_name" value="{{$provider->bank_detail->bank_name??''}}"
                                   placeholder="{{translate('Bank_Name')}}" required>
                            <label>{{translate('Bank_Name')}}</label>
                        </div>
                        <div class="form-floating mb-30">
                            <input type="text" class="form-control" name="branch_name" value="{{$provider->bank_detail->branch_name??''}}"
                                   placeholder="{{translate('Branch_Name')}}" required>
                            <label>{{translate('Branch_Name')}}</label>
                        </div>
                        <div class="form-floating mb-30">
                            <input type="text" class="form-control" name="acc_no" value="{{$provider->bank_detail->acc_no??''}}"
                                   placeholder="{{translate('Acc_No')}}" required>
                            <label>{{translate('Acc._No.')}}</label>
                        </div>
                        <div class="form-floating mb-30">
                            <input type="text" class="form-control" name="acc_holder_name" value="{{$provider->bank_detail->acc_holder_name??''}}"
                                   placeholder="{{translate('Acc._Holder_Name')}}" required>
                            <label>{{translate('Acc._Holder_Name')}}</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--secondary" data-bs-dismiss="modal">{{translate('Close')}}</button>
                        <button type="submit" class="btn btn--primary">{{translate('Submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush
