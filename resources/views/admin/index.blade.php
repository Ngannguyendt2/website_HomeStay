@extends('admin.layout.master')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Trang chủ </a> <i class="fa fa-angle-right"></i></li>
    </ol>
    <!--four-grids here-->
    <div class="four-grids">
        <div class="col-md-3 four-grid">
            <div class="four-agileits">
                <div class="icon">
                    <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                </div>
                <div class="four-text" style="color: white">{{count($users)}}
                </div>

            </div>
        </div>
        <div class="col-md-3 four-grid">
            <div class="four-agileinfo">
                <div class="icon">
                    <i class="glyphicon glyphicon-home" aria-hidden="true"></i>
                </div>
                <div class="four-text"style="color: white">{{count($houses)}}
                </div>

            </div>
        </div>
        <div class="col-md-3 four-grid">
            <div class="four-w3ls">
                <div class="icon">
                    <i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i>
                </div>
                <div class="four-text">

                </div>

            </div>
        </div>
        <div class="col-md-3 four-grid">
            <div class="four-wthree">
                <div class="icon">
                    <i class="glyphicon glyphicon-briefcase" aria-hidden="true"></i>
                </div>
                <div class="four-text">

                </div>

            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!--//four-grids here-->
    <!--agileinfo-grap-->

    <!--//agileinfo-grap-->
    <!--photoday-section-->



    <div class="clearfix"></div>

    <!--//photoday-section-->
    <!--w3-agileits-pane-->
    <div class="w3-agileits-pane">
        <div class="col-md-4 wthree-pan">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-bell fa-fw"></i> Bảng thông báo </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item"> <i class="fa fa-comment fa-fw"></i> Bình luận mới</a>
                        <a href="#" class="list-group-item"> <i class="fa fa-twitter fa-fw"></i> Lượt theo dõi mới </a>
                        <a href="#" class="list-group-item"> <i class="fa fa-envelope fa-fw"></i> Tin nhắn mới </a>
                        <a href="#" class="list-group-item"> <i class="fa fa-tasks fa-fw"></i> Bài đăng mới  </a>

                    </div>
                    <!-- /.list-group -->

                </div>
                <!-- /.panel-body -->
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!--//w3-agileits-pane-->
    <!-- script-for sticky-nav -->
    <script>
        $(document).ready(function () {
            var navoffeset = $(".header-main").offset().top;
            $(window).scroll(function () {
                var scrollpos = $(window).scrollTop();
                if (scrollpos >= navoffeset) {
                    $(".header-main").addClass("fixed");
                } else {
                    $(".header-main").removeClass("fixed");
                }
            });

        });
    </script>
    <!-- /script-for sticky-nav -->
    <!--inner block start here-->
    <div class="inner-block">

    </div>
    <!--inner block end here-->
@endsection
