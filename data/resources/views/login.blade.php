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
<link rel="stylesheet" href="{{ asset('assets/css/separate/pages/login.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/lib/font-awesome/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/lib/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css')}}">
</head>
<body style="background-image: url('{{asset('assets/img/bg.jpg')}}');background-size:cover;
background-repeat:no-repeat">

    
    <div class="page-center">
        <div class="page-center-in">
             
            <div class="container-fluid">

                <form class="sign-box" action="{{URL::to('masuk')}}" method="post" enctype="multipart/form-data">
   {{ csrf_field() }}
                    <div class="sign-avatar">

                        <img src="{{ asset('assets/img/avatar-sign.png')}}" alt="">
                    </div>
                    <header class="sign-title">Login
                     @if(Session::has('error'))
          <p style="color:red;" ;>*{{Session::get('error')}}</p>
        @endif</header>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                    </div>
                   
                    <button type="submit" class="btn btn-rounded">Sign in</button>
                    
                    <!--<button type="button" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>-->
                </form>
            </div>
        </div>
    </div><!--.page-center-->

<script src="{{ asset('assets/js/lib/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{ asset('assets/js/lib/popper/popper.min.js')}}"></script>
    <script src="{{ asset('assets/js/lib/tether/tether.min.js')}}"></script>
    <script src="{{ asset('assets/js/lib/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/plugins.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/lib/match-height/jquery.matchHeight.min.js')}}"></script>
    <script>
        $(function() {
            $('.page-center').matchHeight({
                target: $('html')
            });

            $(window).resize(function(){
                setTimeout(function(){
                    $('.page-center').matchHeight({ remove: true });
                    $('.page-center').matchHeight({
                        target: $('html')
                    });
                },100);
            });
        });
    </script>
<script src="{{ asset('assets/js/app.js')}}"></script>
</body>
</html>