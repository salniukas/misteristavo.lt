<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="verify-paysera" content="b74719a7df2f5cedf05ec7bd809afe8a">

        <title>Misteristavo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
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
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    <span style="color: #e86b49">Misteris</span><span style="color: #0aa8e9">Tavo</span>
                </div>

                <div class="links">
                    @if (Route::has('login'))
                        @auth
                        @else
                            <a href="{{ route('login') }}">Prisijungti</a>

                            @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registruotis</a>
                           @endif
                        @endauth
                    @endif
                    <a href="https://laracasts.com">Kontaktai</a>
                    <a href="https://laravel-news.com">Pagrindinis</a>
                    <a href="https://nova.laravel.com">Fondų Sąrašas</a>
                </div>
            </div>
        </div>
    </body>
</html>
