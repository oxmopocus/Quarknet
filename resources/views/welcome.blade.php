@extends('layouts.app')


<title>KWAK</title>

    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}"><i class="fas fa-home"></i> Home</a>
                    @else
                        <a href="{{ route('login') }}"><i class="fas fa-user"></i> Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"><i class="fas fa-sign-in-alt"></i> Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content">
                <div class="title m-b-md">
                    KWAK
                    <img src="/img/duck.png" alt="" style="width: 60px; height: 60px;">
                </div>


            </div>
        </div>
    </body>
</html>
