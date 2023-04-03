<?php
$orders = App\Models\Order::get();
// $pending_providers = \Modules\ProviderManagement\Entities\Provider::ofApproval(2)->count();
// $logo = business_config('business_logo', 'business_information');
?>
<aside class="aside">
    <!-- Aside Header -->
    <div class="aside-header">
        <!-- Logo -->

            <!-- <a href="" class="logo d-flex gap-2">
                <img src="{{asset('assets/img/user1.png')}}"
                     alt="" class="main-logo">
                <img src="{{asset('assets/img/user2.png')}}"
                     alt="" class="mobile-logo">
            </a> -->
        <!-- </a> -->
        <!-- End Logo -->

        <!-- Aside Toggle Menu Button -->
        <button class="toggle-menu-button aside-toggle border-0 bg-transparent p-0 dark-color">
            <span class="material-icons">menu</span>
        </button>
        <!-- End Aside Toggle Menu Button -->
    </div>
    <!-- End Aside Header -->

    <!-- Aside Body -->
    <div class="aside-body" data-trigger="scrollbar">
        <div class="user-profile media gap-3 align-items-center my-3">
            <div class="avatar">
                <img class="avatar-img rounded-circle"
                     src="{{asset('assets/img/user1.png')}}"
                     onerror=""
                     alt="">
            </div>
            <div class="media-body ">
                
                <span class="card-text">الوريفي</span>
                {{-- <span class="card-text">{{Auth::user()->name}}</span> --}}
            </div>
        </div>

        <!-- Nav -->
        <ul class="nav">
            <li class="nav-category">الرئيسية</li>
            <li>
                <a href="{{route('dashboard')}}" class="">
                    <span class="material-icons" title="Dashboard">dashboard</span>
                    <span class="link-title">لوحةالتحكم</span>
                </a>
            </li>

           
                <li class="nav-category" title="Service Management">ادارةالخدمات</li>                
                <li class="has-sub-item {{(request()->is('admin/category/*') || request()->is('admin/sub-category/*'))?'sub-menu-opened':''}}">
                    <a href="#" class="{{(request()->is('admin/category/*') || request()->is('admin/sub-category/*'))?'active-menu':''}}">
                        <span class="material-icons" title="Service Categories">category</span>
                        <span class="link-title">فئات الخدمات</span>
                    </a>
                    <!-- Sub Menu -->
                    <ul class="nav sub-menu">
                        <li>
                        <a href="{{route('categories.index')}}"
                               class="">
                               قائمة الفئات
                            </a>
                        </li>
                        <li>
                        <a href="{{route('categories.create')}}"
                               class="">
                               أظافة فئة
                            </a> 
                        </li>
                    </ul>
                    <!-- End Sub Menu -->
                </li>
                <li class="has-sub-item {{request()->is('admin/service/*')?'sub-menu-opened':''}}">
                    <a href="#" class="{{request()->is('admin/service/*')?'active-menu':''}}">
                        <span class="material-icons" title="">design_services</span>
                        <span class="link-title">الخدمات</span>
                    </a>
                    <!-- Sub Menu -->
                    <ul class="nav flex-column sub-menu">
                        <li>
                            <a href="{{route('services.index')}}"
                               class="{{request()->is('admin/service/list')?'active-menu':''}}">
                               قائمة الخدمات 
                            </a>
                        </li>
                        <li>
                            <a href="{{route('services.create')}}"
                               class="{{request()->is('admin/service/create')?'active-menu':''}}">
                               أظافة خدمة
                            </a>
                        </li>
                    </ul>
                    <!-- End Sub Menu -->
                </li>
       

           


                <li class="nav-category" title="Booking Management">
                ادارة الطلبات
                </li>
                <li class="has-sub-item {{request()->is('admin/booking/*')?'sub-menu-opened':''}}">
                    <a href="#" class="{{request()->is('admin/booking/*')?'active-menu':''}}">
                        <span class="material-icons" title="Bookings">calendar_month</span>
                        <span class="link-title">أدارة الطلبات</span>
                    </a>
                    <!-- Sub Menu -->
                    <ul class="nav sub-menu">
                        <li><a href="{{route('order.list', ['status'=>'pending'])}}"
                               class=""><span
                                    class="link-title">الحديدة <span
                                        class="count">{{$orders->where('status', 'pending')->count()}}</span></span></a>
                        </li>
                        <li><a href="{{route('order.list', ['status'=>'accepted'])}}"
                               class=""><span
                                    class="link-title">المقبولة <span
                                        class="count">{{$orders->where('status', 'accepted')->count()}}</span></span></a>
                        </li>
                        <li><a href="{{route('order.list', ['status'=>'ongoing'])}}"
                               class=""><span
                                    class="link-title">الجارية<span
                                        class="count">{{$orders->where('status', 'ongoing')->count()}}</span></span></a>
                        </li>
                        <li><a href="{{route('order.list', ['status'=>'completed'])}}"
                               class=""><span
                                    class="link-title">المكتملة <span
                                        class="count">{{$orders->where('status', 'completed')->count()}}</span></span></a>
                        </li>
                        <li><a href="{{route('order.list', ['status'=>'canceled'])}}"
                               class=""><span
                                    class="link-title">المرفوضة <span
                                        class="count">{{$orders->where('status', 'canceled')->count()}}</span></span></a>
                        </li>
                    </ul>
                    <!-- End Sub Menu -->
                </li>
           

            
                <li class="nav-category"
                    title="Provider Management">
                    أدارة المزودين
                </li>
                <li class="has-sub-item  {{(request()->is('admin/handymans/list') || request()->is('admin/provider/create'))?'sub-menu-opened':''}}">
                    <a href="#" class="{{(request()->is('admin/handymans/list') || request()->is('admin/provider/create'))?'active-menu':''}}">
                        <span class="material-icons" title="Providers">engineering</span>
                        <span class="link-title">المزودين</span>
                    </a>
                    <!-- Sub Menu -->
                    <ul class="nav sub-menu">
                        <li>
                            <a href="{{route('handymans.index')}}"
                                class="{{(request()->is('admin/provider/list'))?'active-menu':''}}">قائمة المزودين</a>
                        </li>
                        <li><a href="{{route('handymans.create')}}"
                                class="{{(request()->is('admin/provider/create'))?'active-menu':''}}">أظافة مزود</a></li>
                    </ul>
                    <!-- End Sub Menu -->
                </li>
                
                <!-- <li>
                    <a href=""
                       class="{{request()->is('admin/provider/onboarding-request')?'active-menu':''}}">
                        <span class="material-icons" title="Onboarding Request">description</span>
                        <span class="link-title">الطلبات الجارية<span class="count"></span></span>
                    </a>
                </li> -->
      

            
               
               
        </ul>
        <!-- End Nav -->
    </div>
    <!-- End Aside Body -->
</aside>
