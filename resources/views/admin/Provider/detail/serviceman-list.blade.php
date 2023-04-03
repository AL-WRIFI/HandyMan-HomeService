@extends('adminmodule::layouts.master')

@section('title',translate('provider_details'))

@push('css_or_js')


@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-title-wrap mb-3">
                <h2 class="page-title">{{translate('Provider_Details')}}</h2>
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
                <div class="card-body p-30">
                    {{$servicemen->count() == 0 ? translate('Provider_has_no_serviceman_yet') : ''}}
                    <!-- Service Man List -->
                    <div class="service-man-list">
                        <!-- Service Man -->
                        @foreach($servicemen as $serviceman)
                        <div class="service-man-list__item">
                            <div class="service-man-list__item_header">
                                <img
                                    src="{{asset('storage/app/public')}}/serviceman/profile/{{$serviceman->user->profile_image}}"
                                    onerror="this.src='{{asset('public/assets/admin-module')}}/img/avatar/service-man.png'"
                                    alt="">
                                <h4 class="service-man-name">{{ Str::limit($serviceman->user ? $serviceman->user->first_name.' '.$serviceman->user->last_name:'', 30) }}</h4>
                                <a class="service-man-phone" href="tel:+880372786552">{{$serviceman->user->phone}}</a>
                            </div>
                            <div class="service-man-list__item_body">
                                <a class="service-man-mail"
                                    href="mailto:example@email.com">{{$serviceman->user->email}}</a>
                                <p class="service-man-address">
                                {{--{{dd($serviceman->user)}}--}}
                                </p>
                            </div>
                        </div>
                        @endforeach
                        <!-- End Service Man -->
                    </div>
                    <!-- End Service Man List -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Content -->
@endsection

@push('script')

@endpush
