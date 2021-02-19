<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="">
    <meta name="author" content="">
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <title>{{ config('app.name', 'NN\'s home page') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('static/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('/static/css/scrolling-nav.css') }}" rel="stylesheet">
    <script src='https://kit.fontawesome.com/e424551de5.js'></script>
    <script data-ad-client="ca-pub-5517920503384931" async
            src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="/">Home Page</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="{{ route('channel-status', ['channel' => 'Alissa']) }}">Alissa
                        在線情況</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger"
                       href="{{ route('channel-status', ['channel' => 'Bebhinn']) }}">Bebhinn 在線情況</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="{{ route('channel-status', ['channel' => 'Nao']) }}">Nao
                        在線情況</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @else

                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ route('oauth2.discord') }}" title="Discord">同步 Discord</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ route('get-token') }}">取得報縣token</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                            登出
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<header class="bg-primary text-white" style="margin-bottom: 20px;">
    <div class="container text-center">
        <h1>NN's Notify Bot page</h1>
        <p class="lead">Boss Notify Bot with serverless</p>
    </div>
</header>

@yield('content')

<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2>感謝各方提供支援</h2>
                <p class="lead">如果你覺得機器人很讚 可以<a href="https://p.ecpay.com.tw/17411">贊助</a>一下喔</p>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-white">聯絡我</p>
        <p class="m-0 text-white">Mail: hwt30911@gmail.com</p>
        <p class="m-0 text-white"><i class='fab fa-discord' style='font-size:24px'></i> NN#5459</p>
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('/static/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/static/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Plugin JavaScript -->
<script src="{{ asset('/static/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom JavaScript for this theme -->
<script src="{{ asset('/static/js/scrolling-nav.js') }}"></script>

</body>

</html>
