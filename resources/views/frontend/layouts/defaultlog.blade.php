<!doctype html>
<html class="no-js" lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Poll Animal</title>
        <link rel="icon" type="image/ico" href="{{ asset('/images/backend/images/favicon.ico') }}" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ asset('css/backend/custom.css') }}">
        <link rel="stylesheet" href="{{ asset('css/backend/vendor/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/backend/vendor/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('css/backend/vendor/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('js/backend/vendor/animsition/css/animsition.min.css') }}">
       
        <link rel="stylesheet" href="{{ asset('css/backend/main.css') }}">      
        <script src="{{ asset('js/backend/vendor/modernizr/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
    </head>
    <style type="text/css">
    /* Added by ranveer */
   .form-validation .form-control {
     margin: 0px !important; 
}

.btn.btn-greensea.text-white{
    color: white !important;
    opacity: 1;
}
.btn.btn-md.btn-greensea{
    width: 100% !important;
}
    .brand{
        margin-top:20px;
        /*margin-b*/
    }
    .mt-40 h2.mfran{
    margin-top:30px !important;
}


.mt-40.mfran {
    margin-top:10px !important; 
}

.hint-text {
    color: #999;
    text-align: center;
}

.social-button.mfran{
    margin-top:0px !important;
}

.social-btn .btn-primary {
    background: #507cc0;
}

.social-btn .btn-info {
    background: #64ccf1;
}

.social-btn .btn-danger {
    background: #df4930;
}

.or-seperator {
    margin: 35px 0 0px;
    text-align: center;
    color: black !important;
    border-top: 1px solid #e0e0e0;
}
.or-seperator b {
    padding: 0 10px;
    width: 40px;
    height: 40px;
    font-size: 16px;
    text-align: center;
    line-height: 40px;
    background: #fff;
    display: inline-block;
    border: 1px solid #e0e0e0;
    border-radius: 50%;
    position: relative;
    top: -22px;
    z-index: 1;
}

b, strong {
    font-weight: 700;
}

.social-btn .btn {
    color: #fff;
    /*margin: 10px 0 0 30px;*/
    font-size: 25px;
    width: 55px;
    height: 55px;
    line-height: 38px;
    border-radius: 50%;
    font-weight: normal;
    text-align: center;
    border: none;
    transition: all 0.4s;
}
/* Added by ranveer */
    .page-core {
         background-image: url("{{ asset('images/img/main-banner.jpg') }}") !important;
             background-position: 0px center;
    }
    html * {
          font-family: 'Montserrat', sans-serif;
          box-sizing: border-box;
    }
    .login-box {
        background: #fff;
        padding: 20px;
        max-width: 480px;
        margin: 25vh auto;
        text-align: center;
        letter-spacing: 1px;
        position: relative;
    }
    .login-box:hover {
          box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    }
    .login-box h2 {
        margin: 20px 0 20px;
        padding: 0;
        text-transform: uppercase;
        color: #4688F1;
    }
    .social-button {
          background-position: 25px 0px;
        box-sizing: border-box;
        color: rgb(255, 255, 255);
        cursor: pointer;
        display: inline-block;
        height: 50px;
          line-height: 50px;
        text-align: left;
        text-decoration: none;
        text-transform: uppercase;
        vertical-align: middle;
        width: 100%;
          border-radius: 3px;
        margin: 10px auto;
        outline: rgb(255, 255, 255) none 0px;
        padding-left: 20%;
        transition: all 0.2s cubic-bezier(0.72, 0.01, 0.56, 1) 0s;
          -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }
    #facebook-connect {
        background: rgb(255, 255, 255) url('https://eswarasai.com/projects/social-login/img/facebook.svg') no-repeat scroll 5px 0px / 30px 50px padding-box border-box;
        border: 1px solid rgb(60, 90, 154);
    }
    #facebook-connect:hover {
          border-color: rgb(60, 90, 154);
          background: rgb(60, 90, 154) url('https://eswarasai.com/projects/social-login/img/facebook-white.svg') no-repeat scroll 5px 0px / 30px 50px padding-box border-box;
          -webkit-transition: all .8s ease-out;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease-out;
    }
    #facebook-connect span {
          box-sizing: border-box;
        color: rgb(60, 90, 154);
        cursor: pointer;
        text-align: center;
        text-transform: uppercase;
        border: 0px none rgb(255, 255, 255);
        outline: rgb(255, 255, 255) none 0px;
          -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }
    #facebook-connect:hover span {
          color: #FFF;
          -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }
    #google-connect {
        background: rgb(255, 255, 255) url('https://eswarasai.com/projects/social-login/img/google-plus.png') no-repeat scroll 5px 0px / 50px 50px padding-box border-box;
        border: 1px solid rgb(220, 74, 61);
    }
    #google-connect:hover {
          border-color: rgb(220, 74, 61);
          background: rgb(220, 74, 61) url('https://eswarasai.com/projects/social-login/img/google-plus-white.png') no-repeat scroll 5px 0px / 50px 50px padding-box border-box;
          -webkit-transition: all .8s ease-out;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease-out;
    }
    #google-connect span {
          box-sizing: border-box;
        color: rgb(220, 74, 61);
        cursor: pointer;
        text-align: center;
        text-transform: uppercase;
        border: 0px none rgb(220, 74, 61);
        outline: rgb(255, 255, 255) none 0px;
          -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }
    #google-connect:hover span {
          color: #FFF;
          -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }
    #twitter-connect {
        background: rgb(255, 255, 255) url('https://eswarasai.com/projects/social-login/img/twitter.png') no-repeat scroll 5px 1px / 45px 45px padding-box border-box;
        border: 1px solid rgb(85, 172, 238);
    }
    #twitter-connect:hover {
          border-color: rgb(85, 172, 238);
          background: rgb(85, 172, 238) url('https://eswarasai.com/projects/social-login/img/twitter-white.png') no-repeat scroll 5px 1px / 45px 45px padding-box border-box;
          -webkit-transition: all .8s ease-out;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease-out;
    }
    #twitter-connect span {
          box-sizing: border-box;
        color: rgb(85, 172, 238);
        cursor: pointer;
        text-align: center;
        text-transform: uppercase;
        border: 0px none rgb(220, 74, 61);
        outline: rgb(255, 255, 255) none 0px;
          -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }
    #twitter-connect:hover span {
          color: #FFF;
          -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }
    #linkedin-connect {
        background: rgb(255, 255, 255) url('https://eswarasai.com/projects/social-login/img/linkedin.svg') no-repeat scroll 13px 0px / 28px 45px padding-box border-box;
        border: 1px solid rgb(0, 119, 181);
    }
    #linkedin-connect:hover {
          border-color: rgb(0, 119, 181);
          background: rgb(0, 119, 181) url('https://eswarasai.com/projects/social-login/img/linkedin-white.svg') no-repeat scroll 13px 0px / 28px 45px padding-box border-box;
          -webkit-transition: all .8s ease-out;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease-out;
    }
    #linkedin-connect span {
          box-sizing: border-box;
        color: rgb(0, 119, 181);
        cursor: pointer;
        text-align: center;
        text-transform: uppercase;
        border: 0px none rgb(0, 119, 181);
        outline: rgb(255, 255, 255) none 0px;
          -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }
    #linkedin-connect:hover span {
          color: #FFF;
          -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }
    a:focus, a:hover {
        color: #23527c;
        text-decoration: none;
    }
</style>
    <body id="minovate" class="appWrapper">
        
        @yield('content')

        <script src="{{ asset('js/backend/ajax.googleapis.min.js') }}"></script>
        <script>window.jQuery || document.write('<script src="asset{{ ('js/backend/vendor/jquery/jquery-1.11.2.min.js') }}"><\/script>')</script>
        <script src="{{ asset('js/backend/vendor/bootstrap/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/backend/vendor/jRespond/jRespond.min.js') }}"></script>
        <script src="{{ asset('js/backend/vendor/sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('js/backend/vendor/slimscroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('js/backend/vendor/animsition/js/jquery.animsition.min.js') }}"></script>
        <script src="{{ asset('js/backend/vendor/screenfull/screenfull.min.js') }}"></script>        
        <script src="{{ asset('js/backend/main.js') }}"></script>
                  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-107521779-2"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'UA-107521779-2');
</script>
    </body>
</html>
