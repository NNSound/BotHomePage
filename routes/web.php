<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
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
})->name('home');

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
})->name('oauth2.discord');

Route::any('/discord/callback', function () {

    /** @var SocialiteProviders\Discord\Provider $driver */
    $driver = Socialite::driver('discord');
    $discord = $driver->user();

    /** @var App\User $user */
    $user = App\User::query()->where(['oauth_provider' => 'discord', 'email' => $discord->getEmail()])->first();

    if (is_null($user)) {

        $token = is_null($discord->getEmail()) ? sha1($discord->getEmail()) : sha1($discord->getNickname());

        $user = App\User::create([
            'name' => $discord->getNickname(),
            'email' => $discord->getEmail(),
            'password' => $discord->token,
            'token' => $token,
            'oauth_provider' => 'discord'
        ]);
    }

    Auth::login($user, true);

    return redirect()->route('home');
});
