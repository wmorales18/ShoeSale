<!DOCTYPE html>
<html lang="en">
<!--================================================================================
  Item Name: Materialize - Material Design Admin Template
  Version: 4.0
  Author: PIXINVENT
  Author URL: https://themeforest.net/user/pixinvent/portfolio
================================================================================ -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>Inicio de sesión </title>
    <!-- Favicons-->
    <link rel="icon" href="{{asset('theme/images/favicon/favicon-32x32.png')}}" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="{{asset('theme/images/favicon/apple-touch-icon-152x152.png')}}">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="{{asset('theme/images/favicon/mstile-144x144.png')}}">
    <!-- For Windows Phone -->
    <!-- CORE CSS-->
    <link href="{{asset('theme/css/themes/semi-dark-menu/materialize.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('theme/css/themes/semi-dark-menu/style.css')}}" type="text/css" rel="stylesheet">
    <!-- Custome CSS-->
    <link href="{{asset('theme/css/custom/custom.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('theme/css/layouts/page-center.css')}}" type="text/css" rel="stylesheet">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="{{asset('theme/vendors/perfect-scrollbar/perfect-scrollbar.css')}}" type="text/css" rel="stylesheet">
</head>
<body class="cyan">
<!-- Start Page Loading -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!-- End Page Loading -->
<div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
        @yield('content')
    </div>
</div>
<!-- ================================================
Scripts
================================================ -->
<!-- jQuery Library -->
<script type="text/javascript" src="{{asset('theme/vendors/jquery-3.2.1.min.js')}}"></script>
<!--materialize js-->
<script type="text/javascript" src="{{asset('theme/js/materialize.min.js')}}"></script>
<!--scrollbar-->
<script type="text/javascript" src="{{asset('theme/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="{{asset('theme/js/plugins.js')}}"></script>
<!--custom-script.js - Add your own theme custom JS-->
<script type="text/javascript" src="{{asset('theme/js/custom-script.js')}}"></script>
</body>
</html>