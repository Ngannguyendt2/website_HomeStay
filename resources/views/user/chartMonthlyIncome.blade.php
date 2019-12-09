<!DOCTYPE html>
<html lang="en">
<head>
    <title>LERAMIZ - Landing Page Template</title>
    <meta charset="UTF-8">
    <meta name="description" content="LERAMIZ Landing Page Template">
    <meta name="keywords" content="LERAMIZ, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="{{asset('img/favicon.ico')}}" rel="shortcut icon"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/animate.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"
            integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"
            integrity="sha256-qSIshlknROr4J8GMHRlW3fGKrPki733tLq+qeMCR05Q=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css"
          integrity="sha256-IvM9nJf/b5l2RoebiFno92E5ONttVyaEEsdemDC6iQA=" crossorigin="anonymous"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"
            integrity="sha256-arMsf+3JJK2LoTGqxfnuJPFTU4hAK57MtIPdFpiHXOU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css"
          integrity="sha256-aa0xaJgmK/X74WM224KMQeNQC2xYKwlAt08oZqjeF0E=" crossorigin="anonymous"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
            integrity="sha256-Uv9BNBucvCPipKQ2NS9wYpJmi8DTOEfTA/nH2aoJALw=" crossorigin="anonymous"></script>
</head>
<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header section -->
@include('layouts.header')
<!-- Header section end -->


<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="{{asset('img/page-top-bg.jpg')}}">
</section>
<!--  Page top e
nd -->
<!-- Breadcrumb -->

<div class="site-breadcrumb">
    <div class="container">
        <a href=""><i class="fa fa-home"></i>Trang chủ</a>
        <span><i class="fa fa-angle-right"></i>Thu nhập cá nhân </span>
    </div>
</div>
<!-- Breadcrumb -->
<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <form method="post" id="formCheckDate">
                    @csrf
                    <div class="row">

                        <div class="col-md-3">
                            <b>Chọn tháng </b>
                        </div>
                        <div class="col-md-6">
                            <input type="month" name="month" id="month" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-primary" id="submitCheckDate">Xác nhận</button>
                        </div>
                    </div>
                    <div class="row" style="display: none;margin-top: 50px" id="showMoneyTotal">
                        <h6>Tổng thu nhập tháng (VND):</h6>
                        <h6><b id="totalMoney" class="text text-center"></b></h6>
                    </div>
                </form>
            </div>
            <div class="col-lg-7">
                <div class="panel panel-default">
                    <div class="panel-heading">Thu nhập/ngày (nghìn đồng )</div>
                    <div class="panel-body">
                        <canvas id="line-chart"  style="width: 500px;height: 300px"></canvas>
                    </div>
                </div>
            </div>
        </div>

{{--        <div class="row">--}}
{{--            <div class="col-lg-7>--}}
{{--              --}}
{{--            </div>--}}
{{--        </div>--}}
    </div>


</div>
@include('layouts.footer')
<!-- Footer section end -->
<!--====== Javascripts & Jquery ======-->
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.4/popper.js"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/masonry.pkgd.min.js')}}"></script>
<script src="{{asset('js/magnific-popup.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

<!-- load for map -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.12.1/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script>
    CKEDITOR.replace('description');
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0YyDTa0qqOjIerob2VTIwo_XVMhrruxo"></script>
<script src="{{asset('js/map.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#totalMoney').html('');
        $('#submitCheckDate').click(function () {
            let formCheckDate = $('#formCheckDate');
            let formData = formCheckDate.serialize();
            let checkout = [];
            $.ajax({
                url: '{{route('user.monthlyIncome')}}',
                type: 'POST',
                data: formData,
                success: function (result) {

                    $('#totalMoney').html(result.data);
                    $('#showMoneyTotal').css('display', 'block');
                    let moneys = result.moneyDay;
                    let orders = result.orders;
                    console.log(orders);
                    for (let i = 1; i <= orders.length; i++) {
                        if (i > moneys.length) {
                            moneys.push(0);
                        }
                    }
                    Chart.defaults.global.defaultFontColor = '#000000';
                    Chart.defaults.global.defaultFontFamily = 'Arial';
                    let lineChart = document.getElementById('line-chart');
                    let myChart = new Chart(lineChart, {
                        type: 'line',
                        data: {
                            labels: result.orders,
                            datasets: [
                                {
                                    label: 'Thu nhập cá nhân ',
                                    data: moneys,
                                    backgroundColor: 'rgba(0, 128, 128, 0.3)',
                                    borderColor: 'rgba(0, 128, 128, 0.7)',
                                    borderWidth: 1
                                },
                            ]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            },
                        }
                    });
                },
                error: function (err) {

                }
            })
        })

    });


</script>

</body>
</html>
