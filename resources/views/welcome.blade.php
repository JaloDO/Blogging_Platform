<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100%;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 20px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .links:hover{
                box-shadow: 0 0 2px 1px white;
                color:white;
                background-color:#636b6f;
                opacity:0.7;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .background{
                background-image:url(https://www.square1.io/images/cover/square1-ie-2.jpg);
                height: 100%;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }

        </style>
    </head>
    <body class="background">
        <div class="flex-center position-ref full-height">
            <div class="top-right links">
                
                    <a href="{{ url('/login') }}">Home</a> 
                
            </div>
 @section('content')


@endsection
        </div>
    </body>
</html>
