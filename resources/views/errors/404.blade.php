<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>error 404 </title>
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">

    <style>
        body{
            background-color: #FFFFFF;
        }
        nav {
            margin-top: 20px;
        }
        nav .navbar-brand{
            color: black;
            font-weight: 900;
            letter-spacing: 5px;
            font-family: 'Tajawal', sans-serif;
        }
        .ml-auto {
            margin-left: auto!important;
        }

        .header-bottom .image-error img{
            width: 100%;
        }

        .header-bottom .text-error {
            margin-top: 250px;
            font-family: 'Tajawal', sans-serif;
            text-align: center;
        }
        .header-bottom .text-error h2 {
            color: #474af1;
            font-weight: 600;
        }
    </style>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">

    <div class="container">

        <a href="/home" class="navbar-brand">Zajil Gaza</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item"><a href="/shop" class="nav-link active" >@lang('auth.shop')</a> </li>
            </ul>


        </div>
    </div>
</nav>

<!-- end navbar -->

<!-- header bottom  -->

<section class="header-bottom">
    <div class="container">
        <div class="row">

            <div class="col-lg-6">
                <div class="image-error"><img src="{{asset('public/images/image_error.jpg')}}"> </div>
            </div>

            <div class="col-lg-6">

                <div class="text-error">
                    <h2>Awww .... Don't Cry</h2><p>i't Just error 404 !</p>
                </div>

            </div>

        </div>
    </div>
</section>
</body>
</html>
