<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        .login-page {
            height: 100vh;
        }

        .box {

            height: 100%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .login-page .box input {
            background: #efefef;
            height: 50px;
            border: none;
        }

        .form-container {
            height: 100%;
            display: grid;
            place-items: center;
        }

        .form-inner {
            width: 50%;
        }

        .forgot-password {
            font-size: 18px;
            text-decoration: none;
            color: #888;
        }

        .login-btn {
            border-radius: 50px;
            padding: 15px 75px;
        }

        .logo-container {
            height: 100%;
            display: grid;
            place-items: center
        }

        .logo-container ul li {
            list-style-type: none;
        }

        .logo-container ul li a {
            color: #888;
            font-size: 24px;
        }

        .company-logo {
            display: flex;
            align-items: center;
            flex-direction: column
        }

        @media (min-width: 768px) and (max-width: 992px) {
            .login-page {
                height: auto;
            }

            .form-inner {
                width: 100%;
            }
        }

        @media (max-width: 767px) {
            .login-page {
                height: auto;
            }

            .form-inner {
                width: 100%;
            }

            .form-container {
                display: block !important;
                padding: 15px;
            }

            .col-right {
                display: none !important;
            }

        }

    </style>
    <title>{{getSetting('site_title')??''}} | LogIn</title>
    <link rel="shortcut icon" href="{{asset('frontend/samabesi_logo1.png')}}" type="image/gif" sizes="16x16">
</head>
<body>
<div class="login-page">
    <div class="box">
        <div class="container-fluid" style="height:100%">
            <div class="row" style="height:100%">
                <div class="col-md-6 ">
                    <div class="form-container">
                        <div class="form-inner">
                            <div class="login-title">
                                <h1 class="text-center" style="font-family:unset"><b>Login</b></h1>
                            </div>

                            <form class="mt-lg-5" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input placeholder="Email" name="email" value="{{old('email')}}" type="email"
                                           required class="form-control"/>
                                </div>
                                <br>
                                <div class="form-group">
                                    <input placeholder="Password" name="password" type="password" class="form-control"/>
                                </div>
                                <br>
                                <p class="text-center mb-0">
                                    <a href="{{ route('password.request') }}" class="forgot-password">Forgot Your
                                        Password ?</a>
                                </p>
                                <br>
                                <div class="text-center">
                                    <button class="btn btn-primary text-uppercase login-btn" type="submit"><b>Log In</b>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-right" style="background:#a231be40">
                    <div class="logo-container col-right">
                        <div class="company-logo">
                            @if(getSetting('logo'))
                                <img width="80%"
                                     src="{{asset(url('/').Storage::url(getSetting('logo')))}}"/>
                            @else
                                <img width="80%"
                                     src="http://samabesi.namunacomputer.com/storage/photos/1/samabesi_logo.png"/>
                            @endif
                            <ul class="d-flex justify-content-center mt-md-5">
                                <li class="me-3">
                                    <a href="{{getSetting('facebook_link')??''}}"><i class="fab fa-facebook"></i></a>
                                </li>
                                <li class="me-3">
                                    <a href="{{getSetting('twitter_link')??''}}"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="me-3">
                                    <a href="{{getSetting('youtube_link')??''}}"><i class="fab fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>

                        <div class='login-footer '>
                            © {{now()->year}}{{getSetting('site_title')??' samabesikhabar News'}} . All Rights Reserved
                            | Developed by:<b> Namuna
                                Computer</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>



