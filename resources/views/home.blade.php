@extends('layouts.app2')

@section('content')
{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">{{ __('Dashboard') }}</div>--}}

                {{--<div class="card-body">--}}
                    {{--@if (session('status'))--}}
                        {{--<div class="alert alert-success" role="alert">--}}
                            {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    {{--{{ __('You are logged in!') }}--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <h4 class="card-header">Alissa 愛麗沙伺服器</h4>
                    <div class="card-body">
                        <p class="card-text">目前狀況基本穩定，另外徵求管理員2~3位協助報縣</p>
                    </div>
                    <div class="card-footer">
                        <a href="https://discord.gg/s7AMzhp" class="btn btn-primary">Discord 連結</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <h4 class="card-header">Bebhinn 貝婷伺服器</h4>
                    <div class="card-body">
                        <p class="card-text">目前狀況基本穩定，另外徵求管理員2~3位協助報縣</p>
                    </div>
                    <div class="card-footer">
                        <a href="https://discord.gg/QSfNwg6" class="btn btn-primary">Discord 連結</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <h4 class="card-header">Nao 娜歐伺服器</h4>
                    <div class="card-body">
                        <p class="card-text">目前狀況基本穩定</p>
                    </div>
                    <div class="card-footer">
                        <a href="https://discord.gg/spH3qKG" class="btn btn-primary">Discord 連結</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="services" class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2>內容介紹</h2>
                <p class="lead">目前基本上除了Client之外都把服務放上雲端了，不過部份服務會有額度或是可用性的限制。</p>
                <p class="lead">機器人主體的部份會是全天候運行，如若服務網站掛掉機器人會斷線，不過訊息本身在機器人重新上線之後會發佈。</p>
                <p class="lead">接收訊息的部份是由GCP的 Clound Function 處理，這個會有額度限制之後會試情況開放</p>
            </div>
        </div>
    </div>
</section>

@endsection
