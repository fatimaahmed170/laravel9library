<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>@yield("title")</title>

    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{asset('assets')}}/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href=="{{asset('assets')}}/img/fevicon.png" type="image/gif"/>
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    @yield("head")
</head>

<body>
@include("home.header")

@section('sidebar')
    @include("home.sidebar")
@show

@section('slider')

@show

@yield('content')

<@include("home.footer")
@yield('foot')
</body>
</html>
