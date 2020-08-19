@extends('layouts.app2')

@section('content')
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2>取得報縣token</h2>
                    <h4>{{ Auth::user()->token }}</h4>
                </div>
            </div>
        </div>
    </section>
@endsection