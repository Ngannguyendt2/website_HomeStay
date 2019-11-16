@extends('admin.layout.master')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a> <i class="fa fa-angle-right"></i></li>
    </ol>
    <!--four-grids here-->
    <div class="four-grids">
        <div class="col-md-3 four-grid">
            <div class="four-agileits">
                <div class="icon">
                    <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                </div>
                <div class="four-text">
                    <h3>User</h3>
                    <h4> 24,420 </h4>

                </div>

            </div>
        </div>
        <div class="col-md-3 four-grid">
            <div class="four-agileinfo">
                <div class="icon">
                    <i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
                </div>
                <div class="four-text">
                    <h3>Clients</h3>
                    <h4>15,520</h4>

                </div>

            </div>
        </div>
        <div class="col-md-3 four-grid">
            <div class="four-w3ls">
                <div class="icon">
                    <i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i>
                </div>
                <div class="four-text">
                    <h3>Projects</h3>
                    <h4>12,430</h4>

                </div>

            </div>
        </div>
        <div class="col-md-3 four-grid">
            <div class="four-wthree">
                <div class="icon">
                    <i class="glyphicon glyphicon-briefcase" aria-hidden="true"></i>
                </div>
                <div class="four-text">
                    <h3>Old Projects</h3>
                    <h4>14,430</h4>

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
                <div class="panel-heading"><i class="fa fa-bell fa-fw"></i> Notifications Panel</div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item"> <i class="fa fa-comment fa-fw"></i> New Comment
                            <span class="pull-right text-muted small"><em>4 minutes ago</em> </span> </a>
                        <a href="#" class="list-group-item"> <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                            <span class="pull-right text-muted small"><em>12 minutes ago</em> </span> </a>
                        <a href="#" class="list-group-item"> <i class="fa fa-envelope fa-fw"></i> Message Sent
                            <span class="pull-right text-muted small"><em>27 minutes ago</em> </span> </a>
                        <a href="#" class="list-group-item"> <i class="fa fa-tasks fa-fw"></i> New Task <span
                                class="pull-right text-muted small"><em>43 minutes ago</em> </span> </a>
                        <a href="#" class="list-group-item"> <i class="fa fa-upload fa-fw"></i> Server Rebooted
                            <span class="pull-right text-muted small"><em>11:32 AM</em> </span> </a>
                        <a href="#" class="list-group-item"> <i class="fa fa-bolt fa-fw"></i> Server Crashed!
                            <span class="pull-right text-muted small"><em>11:13 AM</em> </span> </a>
                        <a href="#" class="list-group-item"> <i class="fa fa-tasks fa-fw"></i> New Task <span
                                class="pull-right text-muted small"><em>43 minutes ago</em> </span> </a>
                    </div>
                    <!-- /.list-group -->

                </div>
                <!-- /.panel-body -->
            </div>
        </div>
        <div class="col-md-8 agile-info-stat">
            <div class="stats-info stats-last widget-shadow">
                <table class="table stats-table ">
                    <thead>
                    <tr>
                        <th>S.NO</th>
                        <th>PRODUCT</th>
                        <th>STATUS</th>
                        <th>PROGRESS</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Lorem ipsum</td>
                        <td><span class="label label-success">In progress</span></td>
                        <td><h5>85% <i class="fa fa-level-up"></i></h5></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Aliquam</td>
                        <td><span class="label label-warning">New</span></td>
                        <td><h5>35% <i class="fa fa-level-up"></i></h5></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Lorem ipsum</td>
                        <td><span class="label label-danger">Overdue</span></td>
                        <td><h5 class="down">40% <i class="fa fa-level-down"></i></h5></td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Aliquam</td>
                        <td><span class="label label-info">Out of stock</span></td>
                        <td><h5>100% <i class="fa fa-level-up"></i></h5></td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>Lorem ipsum</td>
                        <td><span class="label label-success">In progress</span></td>
                        <td><h5 class="down">10% <i class="fa fa-level-down"></i></h5></td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>Aliquam</td>
                        <td><span class="label label-warning">New</span></td>
                        <td><h5>38% <i class="fa fa-level-up"></i></h5></td>
                    </tr>
                    </tbody>
                </table>
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
