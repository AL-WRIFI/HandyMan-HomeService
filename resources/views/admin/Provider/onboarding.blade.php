@extends('adminmodule::layouts.master')

@section('title',translate('onboarding_requests'))

@push('css_or_js')

@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-title-wrap mb-3">
                <h2 class="page-title">{{translate('Onboarding_Request')}}</h2>
            </div>

            <div
                class="d-flex flex-wrap justify-content-between align-items-center border-bottom mx-lg-4 mb-10 gap-3">
                <ul class="nav nav--tabs">
                    <li class="nav-item">
                        <a class="nav-link {{$status=='onboarding'?'active':''}}"
                           href="{{url()->current()}}?status=onboarding">
                            {{translate('Onboarding_Requests')}}
                            <sup class="c2-bg py-1 px-2 radius-50 text-white">{{$providers_count['onboarding']}}</sup>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$status=='denied'?'active':''}}"
                           href="{{url()->current()}}?status=denied">
                            {{translate('Denied_Requests')}}
                            <sup class="c2-bg py-1 px-2 radius-50 text-white">{{$providers_count['denied']}}</sup>
                        </a>
                    </li>
                </ul>

                <div class="d-flex gap-2 fw-medium">
                    <span class="opacity-75">{{translate('Total_Providers')}}:</span>
                    <span class="title-color">{{$providers->total()}}</span>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="data-table-top d-flex flex-wrap gap-10 justify-content-between">
                        <form action="{{url()->current()}}"
                              class="search-form search-form_style-two"
                              method="POST">
                            @csrf
                            <div class="input-group search-form__input_group">
                                            <span class="search-form__icon">
                                                <span class="material-icons">search</span>
                                            </span>
                                <input type="search" class="theme-input-style search-form__input"
                                       value="{{$search??''}}" name="search"
                                       placeholder="{{translate('search_here')}}">
                            </div>
                            <button type="submit" class="btn btn--primary">
                                {{translate('search')}}
                            </button>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table id="example" class="table align-middle">
                            <thead>
                            <tr>
                                <th>{{translate('SL')}}</th>
                                <th>{{translate('Provider')}}</th>
                                <th>{{translate('Contact_Info')}}</th>
                                <th>{{translate('Zone')}}</th>
                                <th class="text-center">{{translate('Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($providers as $key=>$provider)
                                <tr>
                                    <td>{{$providers->firstitem()+$key}}</td>
                                    <td>
                                        <a class="media align-items-center gap-2" href="{{route('admin.provider.details',[$provider->id, 'web_page'=>'overview'])}}">
                                            <img class="avatar avatar-lg radius-5"
                                                 src="{{asset('storage/app/public/provider/logo')}}/{{$provider->logo}}"
                                                 onerror="this.src='{{asset('public/assets/admin-module')}}/img/media/info-details.png'"
                                                 alt="">
                                            <h5 class="media-body">
                                                {{Str::limit($provider->company_name, 30)}}
                                            </h5>
                                        </a>
                                    </td>
                                    <td>
                                        <div>
                                            <h5 class="mb-2">{{$provider->contact_person_name}}</h5>
                                            <a class="d-flex fz-12" href="tel:{{$provider->contact_person_phone}}">{{$provider->contact_person_phone}}</a>
                                            <a class="d-flex fz-12" href="mailto:{{$provider->contact_person_email}}">{{$provider->contact_person_email}}</a>
                                        </div>
                                    </td>
                                    <td>
                                        @if($provider->zone)
                                            {{$provider->zone->name}}
                                        @else
                                            <div class="fz-12 badge badge-danger opacity-50">{{translate('Zone is not available')}}</div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="table-actions justify-content-center">
                                            @if($provider->is_approved != 0)
                                                <a type="button" class="btn btn-soft--danger text-capitalize" id="button-deny-{{$provider->id}}"
                                                   onclick="approve_alert('{{route('admin.provider.update-approval',[$provider->id,'deny'])}}','{{translate('want_to_deny_the_provider')}}')">
                                                    {{translate('Deny')}}
                                                </a>
                                            @endif
                                            <a type="button" class="btn btn--success text-capitalize" id="button-{{$provider->id}}"
                                               onclick="approve_alert('{{route('admin.provider.update-approval',[$provider->id,'approve'])}}','{{translate('want_to_approve_the_provider')}}')">
                                                {{translate('Accept')}}
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end">
                        {!! $providers->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Content -->
@endsection

@push('script')
    <script>
        function approve_alert(route, message) {
            Swal.fire({
                title: "<?php echo e(translate('are_you_sure')); ?>?",
                text: message,
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: 'var(--c2)',
                confirmButtonColor: 'var(--c1)',
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Yes',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.get({
                        url: route,
                        dataType: 'json',
                        data: {},
                        beforeSend: function () {
                            /*$('#loading').show();*/
                        },
                        success: function (data) {
                            location.reload();
                            toastr.success(data.message, {
                                CloseButton: true,
                                ProgressBar: true
                            });
                        },
                        complete: function () {
                            /*$('#loading').hide();*/
                        },
                    });
                }
            })
        }
    </script>

@endpush
