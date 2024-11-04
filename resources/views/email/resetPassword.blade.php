<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
    <style>
        .card{
            border: 1px solid darkgrey;
        }
        .card-header{
            padding: 10px;
            background: ghostwhite;
        }
        .card-body{
            padding: 10px;
        }
        .text-center{
            text-align: center;
        }
        .d-flex{
            display: flex;
            width: 100%;
            border-bottom: 1px solid darkgrey;
        }
        .align-items-center{
            align-items: center;
        }
        .justify-content-between{
            justify-content: space-between;
        }
        .justify-content-around{
            justify-content: space-around;
        }
        .col-md-8{
            width: 60%;
        }
        .col-md-2{
            width: 20%;
            padding-left: 20px;
        }
        .border-right{
            border-right: 1px solid darkgrey;
        }
        .col-md-10{
            width: 82%;
        }
        @media (max-width: 767px) {
            .col-md-10{
                width: 84%;
            }
        }
        .w-25{
            width: 25%;
            margin: 0px !important;
        }
        .flex-column{
            flex-direction: column !important;
        }
    </style>
</head>
<body>
<div class="card">
    <div class="card-header text-center">
        <img src="{{ asset('frontend-assets/imgs/theme/logo.svg') }}" class="text-center w-25">
        <h1 class="text-center">Hello, {{ $mailData['user']->name }} <br> You have requested to change Password !! </h1>
    </div>
    <div class="card-body">
        <div>
            <p> Please click on the link below to reset password !  </p>
            <a href="{{ route('resetPassword', $mailData['token']) }}"> Click here to reset password </a>
            <p> Thanks </p>
        </div>
    </div>
</div>

</body>
</html>
