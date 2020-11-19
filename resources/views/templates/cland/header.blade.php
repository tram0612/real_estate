<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" href="/public/templates/cland/img/core-img/3.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="/public/templates/cland/style.css">
    <style type="text/css">
        .alert{
            color: red;
        }
    </style>
    <script src="/public/templates/cland/js/jquery/jquery-2.2.4.min.js"></script>
</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="top-header-content d-flex align-items-center justify-content-between">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="{{route('cland.index')}}"><img src="/public/templates/cland/img/core-img/logo.png" alt=""></a>
                            </div>

                            <!-- Login Search Area -->
                            <div class="login-search-area d-flex align-items-center">
                                <!-- Login -->
                                @php
                                if(Auth::check()){ // /*kiểm tra đã login chưa?*/
                                    $user=Auth::user();
                                    $a1='Xin chào '.$user->username;
                                    $link1 = route('cland.confirm');
                                    $a2='Đăng xuất';
                                    $link2 = route('cland.logout');
                                    }
                                    else{
                                        $a1='Đăng nhập';
                                        $link1 = route('cland.login');
                                        $a2='Đăng ký';
                                        $link2 = route('cland.register');
                                    }
                                @endphp
                                <div class="login d-flex">
                                    <a href="{{$link1}}">{{$a1}}</a>
                                    <a href="{{$link2}}">{{$a2}}</a>
                                </div>
                                <!-- Search Form -->
                                <div class="search-form">
                                    <form action="{{route('cland.search')}}" method="get">
                                        @csrf
                                        <input type="search" name="search" class="form-control" placeholder="Search">
                                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                         
                    </div>
                </div>
            </div>
        </div>
