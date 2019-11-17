<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
        body {
            padding-top: 50px;
        }

        .starter-template {
            padding: 40px 15px;
            text-align: center;
        }
    </style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

<div class="container">
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Nhu cầu</th>
            <th>Loại nhà</th>
            <th>Address</th>
            <th>Mô tả</th>
            <th>Chi tiết nhà</th>
            <th>Giá theo đêm</th>
            <th>Accept</th>
        </tr>
        </thead>
        <tbody>
        @foreach($houses as $house)
            <tr>
                <td>{{$house->demand}}</td>
                <td>{{$house->category->name}}</td>
                <td>Nhà ở thành phố:{{$house->province}},quận huyện: {{$house->district}}
                    , xã/phường: {{$house->ward}}, Đường: {{$house->name_way}}, Số nhà: {{$house->house_number}}</td>
                <td>{{$house->description}}</td>
                <td>Số phòng ngủ:{{$house->totalBedroom}}, Số phòng tắm:{{$house->totalBathroom}}</td>
                <td>{{$house->price}}</td>
                <td>
                    <a href="{{route('test.edit', $house->id)}}"><button class="btn btn-outline-dark">Accept</button></a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div><!-- /.container -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
