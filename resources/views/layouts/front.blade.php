<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>@yield('title')</title>
<link href="{{asset('front/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('front/css/style.css')}}" rel="stylesheet">
<link href="{{asset('front/css/slick.css')}}" rel="stylesheet">
<link href="{{asset('front/css/responsive.css')}}" rel="stylesheet">
<link href="{{asset('front/css/color-switcher-design.css')}}" rel="stylesheet">
<link id="theme-color-file" href="{{asset('front/css/color-themes/default-theme.css')}}" rel="stylesheet">
<link rel="shortcut icon" href="{{asset('front/images/favicon.png')}}" type="image/x-icon">
<link rel="icon" href="{{asset('front/images/favicon.png')}}" type="image/x-icon">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
@yield('styles')
</head>
<body class="hidden-bar-wrapper">
<div class="page-wrapper">
	@include('include.header')
    
	@yield('content')
	
	@include('include.footer')
</div>
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-up"></span></div>
<script src="{{asset('front/js/jquery.js')}}"></script>
<script src="{{asset('front/js/popper.min.js')}}"></script>
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('front/js/jquery.fancybox.js')}}"></script>
<script src="{{asset('front/js/appear.js')}}"></script>
<script src="{{asset('front/js/owl.js')}}"></script>
<script src="{{asset('front/js/wow.js')}}"></script>
<script src="{{asset('front/js/validate.js')}}"></script>
<script src="{{asset('front/js/slick.js')}}"></script>
<script src="{{asset('front/js/jquery-ui.js')}}"></script>
<script src="{{asset('front/js/script.js')}}"></script>
<!--Google Map APi Key-->
<script src="http://maps.google.com/maps/api/js?key=AIzaSyD39_Mb1wKUcuRD-0KPmQT6SQHhEMVX1O0"></script>
<script src="{{asset('front/js/map-script.js')}}"></script>
<script src="{{asset('front/js/color-settings.js')}}"></script>
@yield('scripts')
</body>
</html>