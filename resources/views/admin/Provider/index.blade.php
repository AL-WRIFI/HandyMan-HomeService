@extends('admin.layouts.master')

@section('title','المزودين')

@push('css_or_js')

@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-title-wrap mb-30">
                <h2 class="page-title">قائمة المزودين</h2>
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="row mb-4 g-4">
                        <div class="col-lg-3 col-sm-6">
                            <!-- Statistics Card -->
                            <div class="statistics-card statistics-card__total_provider">
                                <h2>{{$top_cards['total_providers']}}</h2>
                                <h3>مجموع المزودين</h3>
                                <img src="{{asset('public/assets/admin-module')}}/img/icons/subscribed-providers.png" class="absolute-img" alt="">
                            </div>
                            <!-- End Statistics Card -->
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <!-- Statistics Card -->
                            <div class="statistics-card statistics-card__ongoing">
                                <h2>{{$top_cards['total_notaccepted_providers']}}</h2>
                                <h3>يعمل الان</h3>
                                <img src="{{asset('public/assets/admin-module')}}/img/icons/onboarding-request.png" class="absolute-img" alt="">
                            </div>
                            <!-- End Statistics Card -->
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <!-- Statistics Card -->
                            <div class="statistics-card statistics-card__newly_joined">
                                <h2>{{$top_cards['total_active_providers']}}</h2>
                                <h3>مزود نشط</h3>
                                <img src="{{asset('public/assets/admin-module')}}/img/icons/newly-joined.png" class="absolute-img" alt="">
                            </div>
                            <!-- End Statistics Card -->
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <!-- Statistics Card -->
                            <div class="statistics-card statistics-card__not_served">
                                <h2>{{$top_cards['total_inactive_providers']}}</h2>
                                <h3>مزود خامل</h3>
                                <img src="{{asset('public/assets/admin-module')}}/img/icons/not-served.png" class="absolute-img" alt="">
                            </div>
                            <!-- End Statistics Card -->
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="d-flex flex-wrap justify-content-between align-items-center border-bottom mx-lg-4 mb-10 gap-3">
                <ul class="nav nav--tabs">
                    <li class="nav-item">
                        <a class="nav-link {{'all'?'active':''}}"
                           href="{{url()->current()}}?status=all">
                           الكل
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{'active'?'active':''}}"
                           href="{{url()->current()}}?status=active">
                           نشط
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{'inactive'?'active':''}}"
                           href="{{url()->current()}}?status=inactive">
                           خامل
                        </a>
                    </li>
                </ul>

                <div class="d-flex gap-2 fw-medium">
                    <span class="opacity-75">مجموع المزودين:</span>
                    <span class="title-color">{{$providers->count()}}</span>
                </div>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="all-tab-pane">
                    <div class="card">
                        <div class="card-body">
                            <div class="data-table-top d-flex flex-wrap gap-10 justify-content-between">
                                <form action="{{url()->current()}}?status="
                                      class="search-form search-form_style-two"
                                      method="POST">
                                    @csrf
                                    <div class="input-group search-form__input_group">
                                            <span class="search-form__icon">
                                                <span class="material-icons">search</span>
                                            </span>
                                        <input type="search" class="theme-input-style search-form__input"
                                               value="" name="search"
                                               placeholder="search here">
                                    </div>
                                    <button type="submit"
                                            class="btn btn--primary">بحث</button>
                                </form>

                          
                            </div>

                            <div class="table-responsive">
                                <table id="example" class="table align-middle">
                                    <thead class="align-middle">
                                    <tr>
                                        <th>المزود</th>
                                        <th>معلومات التواصل</th>
                                        <th>الطلبات المنجزة</th>
                                        <th>الحالة</th>
                                        <th>تحرير</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($providers as $provider)
                                        <tr>
                                            <td>
                                                <div class="media align-items-center gap-3">
                                                    <div class="avatar avatar-lg">
                                                        <a href="">
                                                            <img class="avatar-img radius-5"
                                                                src="{{ asset('storage/' . $provider->image) }}"
                                                                onerror=""
                                                                alt="">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="mb-1">
                                                            <a href="">
                                                                {{$provider->name}}
                                                            </a>
                                                        </h5>
                                                        <span class="common-list_rating d-flex align-items-center gap-1">
                                                            <span class="material-icons">star</span>
                                                            {{$provider->avg_rating}}
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <a class="fz-12" href="mobileto:{{$provider->phone}}">{{$provider->phone}}</a>
                                                    <a class="fz-12" href="mobileto:{{$provider->email}}">{{$provider->email}}</a>
                                                </div>
                                            </td>
                                            <td>{{$provider->order_count}}</td>
                                            <td>
                                                @livewire('status-form',[
                                                            'model'=> $provider,
                                                            'field'=> 'status',
                                                        ])
                                                        </label>
                                            </td>
                                            <td>
                                                <div class="table-actions">
                                                    <a href="{{route('handymans.edit',$provider)}}"
                                                       class="table-actions_edit">
                                                        <span class="material-icons">edit</span>
                                                    </a>
                                                    
                                                    <form action="{{route('handymans.destroy',[$provider->id])}}"
                                                          method="post" id="delete-{{$provider->id}}" class="hidden">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                          
                                                           
                                                           
                                                            class="table-actions_delete bg-transparent border-0 p-0 demo_check">
                                                        <span class="material-icons">delete</span>
                                                </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-end">
                    
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


@endpush
