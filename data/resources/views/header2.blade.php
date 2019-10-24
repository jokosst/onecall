<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>OneCall</title>

	<link href="{{ asset('assets/img/icon.jpg')}}" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="{{ asset('assets/img/icon.jpg')}}" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="{{ asset('assets/img/icon.jpg')}}" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="{{ asset('assets/img/icon.jpg')}}" rel="apple-touch-icon" type="image/png">
	<link href="{{ asset('assets/img/icon.jpg')}}" rel="icon" type="image/png">
	<link href="{{ asset('assets/img/icon.jpg')}}" rel="shortcut icon">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
<link rel="stylesheet" href="{{ asset('assets/css/lib/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/separate/vendor/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/separate/vendor/bootstrap-daterangepicker.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/lib/clockpicker/bootstrap-clockpicker.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/separate/vendor/bootstrap-select/bootstrap-select.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/lib/prism/prism.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/lib/font-awesome/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/lib/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/lib/datatables-net/datatables.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/separate/vendor/datatables-net.min.css')}}">
<style type="text/css">
 	.box_tabel{
 		width: 100%;
     	display: table;
 		height: 100%;
 		padding:  16px;
 		border-color: #d8e2e7;
 		background-color: #ffffff;
 		border-radius: .25rem;
 	}
 </style>

  
</head>
<body class="with-side-menu">

	<header class="site-header">
	    <div class="container-fluid">
	        <a href="#" class="site-logo">
	            <img class="hidden-md-down" src="{{ asset('assets/img/ONE_CALL_LOGO.png')}}" alt="">
	            <img class="hidden-lg-down" src="{{ asset('assets/img/ONE_CALL_LOGO.png')}}" alt="">
	        </a>
	
	        <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
	            <span>toggle menu</span>
	        </button>
	
	        <button class="hamburger hamburger--htla">
	            <span>toggle menu</span>
	        </button>
	        <div class="site-header-content">
	            <div class="site-header-content-in">
	                <div class="site-header-shown">
	                    
	                    <div class="dropdown user-menu">
	                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                        	<?php
	                        $id =\Auth::user()->id;
	                        $d = \App\User::find($id);
	                        $foto_profil = $d->foto_profil;

	                        	?>
	                            <img src="{{ asset('data/storage/profil/'.$foto_profil)}}" alt="">
	                        </button>
	                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
	                            <a class="dropdown-item" href="{{URL::to('profil')}}"><span class="font-icon glyphicon glyphicon-user"></span>Profile</a>
	                            <!-- <a class="dropdown-item" href="about_us"><span class="font-icon font-icon-question"></span>About Us</a> -->
	                             <div class="dropdown-divider"></div>
	                            <a class="dropdown-item" href="{{URL::to('keluar')}}"><span class="font-icon glyphicon glyphicon-log-out"></span>Logout</a>
	                        </div>
	                    </div>
	
	                </div><!--.site-header-shown-->
	
	                <div class="mobile-menu-right-overlay"></div>
	                 	
	                
	            </div><!--site-header-content-in-->
	        </div><!--.site-header-content-->
	    </div><!--.container-fluid-->
	</header><!--.site-header-->