<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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
                font-size: 13px;
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
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
        <div id="token"></div>
        <div id="msg"></div>
        <div id="notis"></div>
        <div id="err"></div>
        <script src="https://www.gstatic.com/firebasejs/4.6.2/firebase.js"></script>
        <script>
            MsgElem = document.getElementById("msg");
            TokenElem = document.getElementById("token");
            NotisElem = document.getElementById("notis");
            ErrElem = document.getElementById("err");
            // Initialize Firebase
            // TODO: Replace with your project's customized code snippet
            var config = {
                apiKey: "AIzaSyDikAfYKlJGEFxflm1OlrTFjDyNvsnLaqo",
                authDomain: "notificaciones-de-colegios.firebaseapp.com",
                databaseURL: "https://notificaciones-de-colegios.firebaseio.com",
                projectId: "notificaciones-de-colegios",
                storageBucket: "notificaciones-de-colegios.appspot.com",
                messagingSenderId: "553547457899",
                appId: "1:553547457899:web:5c51cb45c60282313d582e",
                measurementId: "G-HGTG7K92NX"
            };
            firebase.initializeApp(config);
            const messaging = firebase.messaging();
            messaging
                .requestPermission()
                .then(function () {
                    MsgElem.innerHTML = "Notification permission granted." 
                    console.log("Notification permission granted.");
                    
                    // get the token in the form of promise
                    return messaging.getToken()
                })
                .then(function(token) {
                    TokenElem.innerHTML = "token is : " + token
                    console.log(token)
                })
                .catch(function (err) {
                    ErrElem.innerHTML =  ErrElem.innerHTML + "; " + err
                    console.log("Unable to get permission to notify.", err);
                });
            messaging.onMessage(function(payload) {
                console.log("Message received. ", payload);
                NotisElem.innerHTML = NotisElem.innerHTML + JSON.stringify(payload) 
            });
        </script>
    </body>
</html>
