<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use \Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/channel-status', function () {
    return view('channel-status');
})->name('channel-status');

Route::get('/get-token', function () {
    return view('get-token');
})->name('get-token');

Route::get('/test', function () {
    return trans('Login');
});

Route::any('/oauth2/discord', function () {
    return Socialite::driver('discord')->redirect();
});

Route::any('/callback', function () {

    /** @var SocialiteProviders\Discord\Provider $driver */
    $driver = Socialite::driver('discord');
    $user = $driver->stateless()->user();
    $token = $user->token;
    $refreshToken = $user->refreshToken;
    $expiresIn = $user->expiresIn;


//    var_dump([$user['username'], $token]);
});

Route::any('/user', function (Request $request) {
    $token = $request->get('token');
    /** @var SocialiteProviders\Discord\Provider $driver */
    $driver = Socialite::driver('discord');
    $user = $driver->userFromToken($token);

//    var_dump($user);
//
//    var_dump($user['username']);
});