<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Login</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/backend_css/matrix-login.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
    <!--Boostrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <!-- <script src="http://127.0.0.1:8000/js/app.js" defer></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>

</head>

<body style="background: #fff;">

    @include('layouts.adminLayout.admin_front_header')

    <style>
        .login-bg {
            background: url('/images/login-background.jpg');
            background-position: relative;
            background-repeat: no-repeat;
        }

        #loginbox {
            padding: 30px;
        }

        .alert.alert-error.alert-block {
            background: #fff;
        }

        aside {
            display: none;
        }

        form {
            height: 100% !important;
        }

        @media screen and (max-width:425px) {
            section.bg.sticky-top {
                height: 61px;
            }

            section.bg.sticky-top .container {
                margin-top: 8px !important;
            }
        }

        @media screen and (max-width:375px) {
            section.bg.sticky-top .container {
                margin-top: 12px !important;
            }

            #loginbox {
                padding: 16px;
            }
        }
    </style>
    <div class="login-bg">
        <div id="loginbox">
            @if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{!! session('flash_message_error') !!} </strong>
            </div>
            @endif
            @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{!! session('flash_message_success') !!} </strong>
            </div>
            @endif
            <form id="loginform" class="form-vertical" method="post" action="{{ url('admin')}}" style="background-color: #eee;border-top:none;height:60vh;">{{csrf_field()}}
                <div class="control-group normal_text" style="background-color: #eee;">
                    <h3><img src="{{ asset('images/logo.png') }}" alt="Logo" /></h3>
                    <h3 style="color: #AB020E;">Welcome to Rasan Mart</h3>
                    <p style="color: #AB020E;">Login to see your profile and order details.</p>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <label class="pl" for="email">Email</label>
                            <span class="add-on"><i class="fa fa-user" style="color: #AB020E;"> </i></span><input type="email" name="email" placeholder="Username" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <label class="pl" for="password">Paasword</label>
                            <span class="add-on"><i class="fa fa-lock" style="color: #AB020E;"></i></span><input type="password" name="password" placeholder="Password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class=""><a href="/forgot-password" class="flip-link font-s" id="to-recover">Lost password?</a></span>
                    <span class="float-right"><input type="submit" value="login" class="btn btn-danger" /></span>
                </div>
            </form>
            <form id="recoverform" action="#" class="form-vertical">
                <p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>

                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                    </div>
                </div>

                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><a class="btn btn-info">Recover</a></span>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/backend_js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/backend_js/matrix.login.js') }}"></script>
    <script src="{{ asset('js/backend_js/bootstrap.min.js') }}"></script>

    @include('layouts.frontLayout.footer')
    
<script>
window.onload = function() {
  if (window.location.href.indexOf('/admin')) {
    //Hide the element.
    document.querySelectorAll('.cart-bar')[0].style.display = 'none';
  }
};
</script>
</body>

</html>