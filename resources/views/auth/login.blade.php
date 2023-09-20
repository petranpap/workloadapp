<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/build/assets/favicon/favicon.ico">

    <link rel="stylesheet" href="build/assets/fonts/icomoon/style.css">

    <link rel="stylesheet" href="build/assets/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="build/assets/css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="build/assets/css/style.css">
    <title>{{config('app.name').'| Login'}}</title>
</head>
<body>



<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <img src="build/assets/images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6 contents">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="mb-4">
                            <h3>Sign In </h3>
                            <p class="mb-4">To the Workload App.</p>
                        </div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group first">
                                <label for="email" :value="__('Email')">Email</label>
                                <input type="text" class="form-control" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" >


                            </div>
                            <div class="form-group last mb-4">
                                <label for="password" :value="__('Password')">Password</label>
                                <input type="password" class="form-control" id="password"  name="password" required autocomplete="current-password" >


                            </div>
                            @if (count($errors) > 0)
                            <div style="
                            color: red;
                            list-style: none;
                            border: 1px solid red;
                            padding: 8px;
                            ">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            @endif
                            <div class="d-flex mb-5 align-items-center">
                                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                                    <input type="checkbox" checked="checked"/>
                                    <div class="control__indicator"></div>
                                </label>
{{--                                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>--}}
                            </div>

                            <input type="submit" value="Log In" class="btn btn-block btn-primary">


                        </form>
                        <span class="d-block text-left my-4 text-muted">&mdash; or Register &mdash;</span>
                        <a href="/register">
                        <input type="button" value="Register" class="btn btn-block btn-danger">
                        </a>
                        <img width="220" height="150" src="https://www.nup.ac.cy/wp-content/uploads/2021/07/Neapolis-Logo-EN.png" class="attachment-full size-full entered lazyloaded" alt="" decoding="async" data-lazy-src="https://www.nup.ac.cy/wp-content/uploads/2022/02/logo-home-1-1.svg" data-ll-status="loaded" naptha_cursor="region" style="
    display: block;
    margin-left: auto;
    margin-right: auto;
">

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>


<script src="build/assets/js/jquery-3.3.1.min.js"></script>
<script src="build/assets/js/popper.min.js"></script>
<script src="build/assets/js/bootstrap.min.js"></script>
<script src="build/assets/js/main.js"></script>
</body>
</html>
