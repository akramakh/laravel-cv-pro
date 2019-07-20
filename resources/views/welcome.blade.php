@extends('layouts.app')
<!-- Styles -->
<link href="{{ asset('css/template.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/font-awesome/font-awesome.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/normalize.min.css') }}" rel="stylesheet">

      <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}" defer></script>

    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
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
    a > i{
        padding-top: 5px;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>
@section('content')
    <div class="flex-center position-ref full-height">
    <!--
            @if (Route::has('login'))
        <div class="top-right links">
@auth
                <a href="{{ url('/home') }}">Home</a>
                    @else
        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
            -->

        <div class="content">
            <div class="title m-b-md">
                YOUR CV
            </div>

            <div class="links">
                <a href="#">Documentation</a>
                <a href="#">Youtube</a>
                <a href="#">News</a>
                <a href="#">Forge</a>
                <a href="#">GitHub</a>
            </div>
        </div>
    </div>
@endsection