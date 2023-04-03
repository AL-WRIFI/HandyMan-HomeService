<header class="header fixed-top">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-between">
            <div class="col-2">
                <!-- Header Menu -->
                <div class="header-toogle-menu">
                    <button class="toggle-menu-button aside-toggle border-0 bg-transparent p-0 dark-color">
                        <span class="material-icons">menu</span>
                    </button>
                </div>
                <!-- End Header Menu -->
            </div>
            <div class="col-10">
                <!-- Header Right -->
                <div class="header-right">
                    <ul class="nav justify-content-end align-items-center gap-30">
                        <li>
                            <button class="toggle-search-btn px-0 d-sm-none">
                                <span class="material-icons">search</span>
                            </button>
                            <!-- Header Search -->
                            <form action="#" class="search-form" autocomplete="off">
                                <div class="input-group position-relative search-form__input_group">
                                    <span class="search-form__icon">
                                        <span class="material-icons">search</span>
                                    </span>
                                    <input type="search" class="theme-input-style search-form__input"
                                           id="search-form__input" placeholder="Search Here"/>
                                    <div class="dropdown-menu rounded">
                                        <div class="show-search-result">
                                           
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- End Header Search -->
                        </li>
                        
                        <li>
                            {{-- <x-admin.notification-list count="7" /> --}}
                            <!-- Header Messages -->
                            <div class="messages">
                                <a href="" class="header-icon count-btn">
                                    <span class="material-icons">sms</span>
                                    <span class="count" id="message_count">0</span>
                                </a>
                            </div>
                            <!-- End Main Header Messages -->
                        </li>
                        <li>
                            <!-- User -->
                            <div class="user mt-n1">
                                <a href="#" class="header-icon user-icon" data-bs-toggle="dropdown">
                                    <img width="30" height="30"
                                         src=""
                                         onerror=""
                                         class="rounded-circle" alt="">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href=""
                                       class="dropdown-item-text media gap-3 align-items-center">
                                        <div class="avatar">
                                            <img class="avatar-img rounded-circle" width="50" height="50"
                                                 src=""
                                                 onerror=""
                                                 alt="">
                                        </div>
                                        <div class="media-body ">
                                            <h5 class="card-title"></h5>
                                            <span class="card-text"></span>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="">
                                        <span class="text-truncate" title="Settings">Settings</span>
                                    </a>
                                    <form method="POST" action="">
                                    @csrf
                                    @method('post')
                                    <a class="dropdown-item" :href=""
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    <span class="text-truncate" title="Sign Out">Sign Out</span>
                                    </a>
                                   </form>
                                </div>
                            </div>
                            <!-- End User -->
                        </li>
                    </ul>
                </div>
                <!-- End Header Right -->
            </div>
        </div>
    </div>
</header>
