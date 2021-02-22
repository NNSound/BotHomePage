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
    if (!Auth::check()) {
        return redirect()->route('login');
    }
    return view('get-token');
})->name('get-token');

Route::get('/test', function () {
    return trans('Login');
});

Route::any('/oauth2/discord', function () {
    Session::put('uid', Auth::id());

    return Socialite::driver('discord')->redirect();
})->name('oauth2.discord');

Route::any('/discord/callback', function () {

    /** @var SocialiteProviders\Discord\Provider $driver */
    $driver = Socialite::driver('discord');
    $discord = $driver->user();

    $uid = Session::get('uid');
    /** @var App\User $user */
    $user = App\User::query()->where(['id' => $uid])->first();

    if (is_null($user)) {

        $token = is_null($discord->getEmail()) ? sha1($discord->getEmail()) : sha1($discord->getNickname());

        $user = App\User::create([
            'name' => $discord->getNickname(),
            'email' => $discord->getEmail(),
            'password' => $discord->token,
            'token' => $token,
            'oauth_provider' => 'discord',
            'oauth_provider_id' => $discord->id,
        ]);

        Auth::login($user, true);
    } else {
        App\User::query()->where(['id' => $uid])->update([
            'oauth_provider' => 'discord',
            'oauth_provider_id' => (string) $discord->id,
        ]);
    }
    Session::forget('uid');

    return redirect()->route('home');
});
