@extends('adminmodule::layouts.master')

@section('title',translate('service_details'))

@push('css_or_js')
    <link rel="stylesheet" href="{{asset('public/assets/admin-module')}}/plugins/select2/select2.min.css"/>
    <link rel="stylesheet" href="{{asset('public/assets/admin-module')}}/plugins/dataTables/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="{{asset('public/assets/admin-module')}}/plugins/dataTables/select.dataTables.min.css"/>
    <link rel="stylesheet" href="{{asset('public/assets/admin-module')}}/plugins/wysiwyg-editor/froala_editor.min.css"/>
@endpush

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-title-wrap mb-3">
                <h2 class="page-title">{{translate('service_details')}}</h2>
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="row mb-4 g-4">
                        <div class="col-lg-4 col-sm-12">
                            <!-- Business Summary -->
                            <div class="statistics-card statistics-card__total-orders">
                                <h2>{{$service->bookings_count}}</h2>
                                <h3>{{translate('total_bookings')}}</h3>
                                <img src="{{asset('public/assets/admin-module')}}/img/icons/total-orders.png"
                                     class="absolute-img" alt="">
                            </div>
                            <!-- End Business Summary -->
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <!-- Business Summary -->
                            <div class="statistics-card statistics-card__ongoing">
                                <h2>{{$service['ongoing_count']??0}}</h2>
                                <h3>{{translate('ongoing')}}</h3>
                                <img src="{{asset('public/assets/admin-module')}}/img/icons/ongoing.png"
                                     class="absolute-img" alt="">
                            </div>
                            <!-- End Business Summary -->
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <!-- Business Summary -->
                            <div class="statistics-card statistics-card__canceled">
                                <h2>{{$service['canceled_count']??0}}</h2>
                                <h3>{{translate('canceled')}}</h3>
                                <img src="{{asset('public/assets/admin-module')}}/img/icons/canceled.png"
                                     class="absolute-img" alt="">
                            </div>
                            <!-- End Business Summary -->
                        </div>
                    </div>
                </div>
            </div>


            <!-- Nav Tabs -->
            <div class="mb-3">
                <ul class="nav nav--tabs nav--tabs__style2">
                    <li class="nav-item">
                        <button class="nav-link {{!isset($web_page) || $web_page=='general'?'active':''}}" data-bs-toggle="tab"
                                data-bs-target="#general-tab-pane">{{translate('general_info')}}
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link {{isset($web_page) && $web_page=='faq'?'active':''}}" data-bs-toggle="tab"
                                data-bs-target="#faq-tab-pane">{{translate('faq')}}</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link {{isset($web_page) && $web_page=='review'?'active':''}}" data-bs-toggle="tab"
                                data-bs-target="#review-tab-pane">{{translate('reviews')}}
                        </button>
                    </li>
                </ul>
            </div>
            <!-- End Nav Tabs -->

            <!-- Tab Content -->
            <div class="tab-content">
                <div class="tab-pane fade {{!isset($web_page) || $web_page=='general'?'show active':''}}" id="general-tab-pane">
                    <div class="card">
                        <div class="card-body p-30">
                            <div class="media flex-column flex-md-row gap-3 mb-3">
                                <div class="">
                                    <img width="300"
                                         src="{{asset('storage/app/public/service')}}/{{$service->cover_image}}"
                                         class="img-dropshadow" alt="">
                                </div>
                                <div class="media-body ">
                                    <div
                                        class="d-flex flex-wrap gap-3 align-items-center justify-content-between mb-3">
                                        <h2 class="c1">{{$service->name}}</h2>
                                        <a href="{{route('admin.service.edit',[$service->id])}}"
                                           class="btn btn--primary">
                                            <span class="material-icons">border_color</span>
                                            {{translate('edit')}}
                                        </a>
                                    </div>
                                    <p>{{$service->short_description}}</p>
                                </div>
                            </div>

                            <!-- Nav Tabs -->
                            <div class="mb-3">
                                <ul class="nav nav--tabs">
                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab"
                                                data-bs-target="#long-description-tab-pane">{{translate('details')}}
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab"
                                                data-bs-target="#price-table-tab-pane">{{translate('price_table')}}
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Nav Tabs -->

                            <!-- Tab Content -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="long-description-tab-pane">
                                    {!! $service->description !!}
                                </div>
                                <div class="tab-pane fade" id="price-table-tab-pane">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-10">
                                            <!-- Nav Tabs -->
                                            <div class="mt-3 mb-4">
                                                <ul class="nav nav--tabs nav--tabs__style3">
                                                    @php($count=0)
                                                    @foreach($service->category->zones as $index=>$zone)
                                                        <li class="nav-item">
                                                            <button class="nav-link {{$count==0?'active':''}}"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#tab-{{$zone->id}}">{{$zone->name??""}}
                                                            </button>
                                                        </li>
                                                        @php($count++)
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <!-- End Nav Tabs -->

                                            <!-- Tab Content -->
                                            <div class="tab-content">
                                                @php($count=0)
                                                @foreach($service->category->zones as $index=>$zone)
                                                    <div class="tab-pane fade show {{$count==0?'active':''}}"
                                                         id="tab-{{$zone->id}}">
                                                        <p class="text-center"><strong
                                                                class="c1 me-1">{{$service->variations->where('zone_id',$zone->id)->count()}}</strong>
                                                            {{translate('available_variants')}}
                                                        </p>
                                                        <!-- Service Price List -->
                                                        <div class="service-price-list">
                                                            @foreach($service->variations->where('zone_id',$zone->id)->all() as $variant)
                                                                <div class="service-price-list-item">
                                                                    <p>{{$variant->variant}} </p>
                                                                    <h3 class="c1">{{with_currency_symbol($variant->price)}}</h3>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <!-- End Service Price List -->
                                                    </div>
                                                    @php($count++)
                                                @endforeach
                                            </div>
                                            <!-- End Tab Content -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Tab Content -->
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade {{isset($web_page) && $web_page=='faq'?'show active':''}}" id="faq-tab-pane">
                    <div class="card mb-30">
                        <div class="card-body p-30">
                            <form action="javascript:void(0)" method="POST" class="mb-30" id="faq-form">
                                @csrf
                                <div class="form-floating mb-30">
                                    <input type="text" class="form-control" placeholder="{{translate('question')}}"
                                           name="question" required="">
                                    <label>{{translate('question')}}</label>
                                </div>
                                <div class="form-floating mb-30">
                                    <textarea class="form-control" placeholder="{{translate('answer')}}" name="answer"
                                              required=""></textarea>
                                    <label>{{translate('answer')}}</label>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn--primary">{{translate('add_faq')}}</button>
                                </div>
                            </form>

                            <div class="text-center mb-30">
                                <div class="" id="faq-list">
                                    @include('servicemanagement::admin.partials._faq-list',['faqs'=>$faqs])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade {{isset($web_page) && $web_page=='review'?'show active':''}}" id="review-tab-pane">
                    <div class="card mb-30">
                        <div class="card-body p-30">
                            <div class="row">
                                <div class="col-lg-5 mb-30 mb-lg-0 d-flex justify-content-center">
                                    <div class="rating-review">
                                        <h2 class="rating-review__title">
                                            <span class="rating-review__out-of">{{$service->avg_rating}}</span>/5
                                        </h2>
                                        <div class="rating">
                                            <span
                                                class="{{$service->avg_rating>=1?'material-icons':'material-symbols-outlined'}}">{{$service->avg_rating>=1?'star':'grade'}}</span>
                                            <span
                                                class="{{$service->avg_rating>=2?'material-icons':'material-symbols-outlined'}}">{{$service->avg_rating>=2?'star':'grade'}}</span>
                                            <span
                                                class="{{$service->avg_rating>=3?'material-icons':'material-symbols-outlined'}}">{{$service->avg_rating>=3?'star':'grade'}}</span>
                                            <span
                                                class="{{$service->avg_rating>=4?'material-icons':'material-symbols-outlined'}}">{{$service->avg_rating>=4?'star':'grade'}}</span>
                                            <span
                                                class="{{$service->avg_rating>=5?'material-icons':'material-symbols-outlined'}}">{{$service->avg_rating>=5?'star':'grade'}}</span>
                                        </div>
                                        <div class="rating-review__info d-flex flex-wrap gap-3">
                                            @php($total_review_count=$service->reviews->count())
                                            <span>{{$service->rating_count}} {{translate('ratings')}}</span>
                                            <span>{{$total_review_count}} {{translate('reviews')}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <ul class="common-list common-list__style2 after-none gap-10">
                                        <li>
                                            <span class="review-name">{{translate('excellent')}}</span>
                                            @php($excellent_count=$service->reviews->where('review_rating',5)->count())
                                            @php($excellent=(divnum($excellent_count,$total_review_count))*100)
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar"
                                                     style="width: {{$excellent}}%"
                                                     aria-valuenow="{{$excellent}}" aria-valuemin="0"
                                                     aria-valuemax="100">
                                                </div>
                                            </div>
                                            <span class="review-count">{{$excellent_count}}</span>
                                        </li>
                                        <li>
                                            <span class="review-name">{{translate('good')}}</span>
                                            @php($good_count=$service->reviews->where('review_rating',4)->count())
                                            @php($good=(divnum($excellent_count,$total_review_count))*100)
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: {{$good}}%"
                                                     aria-valuenow="{{$good}}" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                            <span class="review-count">{{$good_count}}</span>
                                        </li>
                                        <li>
                                            <span class="review-name">{{translate('avarage')}}</span>
                                            @php($average_count=$service->reviews->where('review_rating',3)->count())
                                            @php($average=(divnum($average_count,$total_review_count))*100)
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar"
                                                     style="width: {{$average}}%"
                                                     aria-valuenow="{{$average}}" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                            <span class="review-count">{{$average_count}}</span>
                                        </li>
                                        <li>
                                            <span class="review-name">{{translate('below_avarage')}}</span>
                                            @php($below_average_count=$service->reviews->where('review_rating',2)->count())
                                            @php($below_average=(divnum($below_average_count,$total_review_count))*100)
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar"
                                                     style="width: {{$below_average}}%"
                                                     aria-valuenow="{{$below_average}}" aria-valuemin="0"
                                                     aria-valuemax="100">
                                                </div>
                                            </div>
                                            <span class="review-count">{{$below_average_count}}</span>
                                        </li>
                                        <li>
                                            <span class="review-name">{{translate('poor')}}</span>
                                            @php($poor_count=$service->reviews->where('review_rating',1)->count())
                                            @php($poor=(divnum($poor_count,$total_review_count))*100)
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: {{$poor}}%"
                                                     aria-valuenow="{{$poor}}" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                            <span class="review-count">{{$poor_count}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end border-bottom pb-2 mb-10">
                        <div class="d-flex gap-2 fw-medium">
                            <span class="opacity-75">{{translate('total_reviews')}}:</span>
                            <span class="title-color">{{$reviews->total()}}</span>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="data-table-top d-flex flex-wrap gap-10 justify-content-between">
                                <form action="{{url()->current()}}" class="search-form search-form_style-two"
                                      method="POST">
                                    @csrf
                                    <div class="input-group search-form__input_group">
                                            <span class="search-form__icon">
                                                <span class="material-icons">search</span>
                                            </span>
                                        <input type="search" class="theme-input-style search-form__input"
                                               value="{{$search}}" name="search"
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
                                        <th>{{translate('reviewer')}}</th>
                                        <th>{{translate('ratings')}}</th>
                                        <th>{{translate('reviews')}}</th>
                                        {{--<th>{{translate('status')}}</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($reviews as $review)
                                        <tr>
                                            <td>{{$review->customer?$review->customer->first_name:''}} {{$review->customer?$review->customer->last_name:''}}</td>
                                            <td>{{$review->review_rating}}</td>
                                            <td>
                                                <p>
                                                    {{$review->review_comment}}
                                                </p>
                                            </td>
                                            {{--<td>
                                                <label class="switcher">
                                                    <input class="switcher_input" onclick="route_alert('{{route('admin.review.status-update',[$review->id])}}','{{translate('want_to_update_status')}}')"
                                                           type="checkbox" {{$review->is_active?'checked':''}}>
                                                    <span class="switcher_control"></span>
                                                </label>
                                            </td>--}}
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-end">
                                {!! $reviews->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Tab Content -->
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('#faq-form').on('submit', e => {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var form = $('#faq-form')[0];
            var data = new FormData(form);

            $.post({
                url: '{{route('admin.faq.store',[$service->id])}}',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 800000,
                success: function (response) {
                    console.log(response.template);
                    $('#faq-list').empty().html(response.template);
                },
                complete: function () {
                    $("#faq-form")[0].reset();
                    toastr.success('{{translate('successfully_added')}}')
                }
            });
        });

        function ajax_post(form_id) {
            "use strict";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var form = $('#' + form_id)[0];
            var data = new FormData(form);
            let route = $('#' + form_id).attr('action');

            $.post({
                url: route,
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 800000,
                success: function (response) {
                    console.log(response.template);
                    $('#faq-list').empty().html(response.template);
                },
                complete: function () {
                    $("#faq-form")[0].reset();
                    toastr.success('{{translate('successfully_updated')}}')
                }
            });
        }

        function ajax_delete(route) {
            "use strict";

            Swal.fire({
                title: "{{translate('are_you_sure')}}?",
                text: '{{translate('want_to_delete_this_faq')}}',
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
                        success: function (response) {
                            $('#faq-list').empty().html(response.template);
                            toastr.success('{{translate('successfully_deleted')}}');
                        },
                        complete: function () {
                            /*$('#loading').hide();*/
                        },
                    });
                }
            })
        }

        function ajax_status_update(route, id) {
            "use strict";
            Swal.fire({
                title: "{{translate('are_you_sure')}}?",
                text: '{{translate('want_to_update_status_of_this_faq')}}',
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
                        success: function (response) {
                            toastr.success('{{translate('successfully_updated')}}');
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
