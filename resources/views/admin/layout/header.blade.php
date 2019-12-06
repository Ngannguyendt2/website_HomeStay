<div class="header-main">
    <div class="header-main">
        <div class="logo-w3-agile">
            <h1><a href="{{route('admin.index')}}">Trang chủ </a></h1>
        </div>
        <div class="w3layouts-left">

            <!--search-box-->
            <div class="w3-search-box">
                <form action="#" method="post">
                    <input type="text" placeholder="Tìm kiếm ..." required="">
                    <input type="submit" value="">
                </form>
            </div><!--//end-search-box-->
            <div class="clearfix"></div>
        </div>
        <div class="w3layouts-right">
            <div class="profile_details_left">
                <!--notifications of menu start -->
                <ul class="nofitications-dropdown">
                    <li class="dropdown head-dpdn">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                    class="fa fa-envelope"></i></a>

                    </li>
                    <li class="dropdown head-dpdn">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                    class="fa fa-bell"></i></a>

                    </li>
                    <li class="dropdown head-dpdn">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                    class="fa fa-tasks"></i></a>

                    </li>
                    <div class="clearfix"></div>
                </ul>
                <div class="clearfix"></div>
            </div>
            <!--notification menu end -->

            <div class="clearfix"></div>
        </div>
        <div class="profile_details w3l">
            <ul>
                <li class="dropdown profile_details_drop">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <div class="profile_img">
                            <span class="prfil-img"><img src="{{asset('admin/images/in4.jpg')}}" alt=""> </span>
                            <div class="user-name">
                                <p>{{Auth::user()->name}}</p>
                                <span>Người quản trị </span>
                            </div>
                            <i class="fa fa-angle-down"></i>
                            <i class="fa fa-angle-up"></i>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                    <ul class="dropdown-menu drp-mnu">
                        <li><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                        style="color: black"><i class="fa fa-sign-out"></i>Đăng xuất</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </ul>

                </li>
            </ul>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
