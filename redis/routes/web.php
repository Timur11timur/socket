<?php

use App\Events\UserSignedUp;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;

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

Route::get('/', function () {
    $data = [
        'event' => 'UserSignedUp',
        'data' => [
            'username' => 'JohnDoe - ' . now()
        ]
    ];

    Redis::publish('test-channel', json_encode($data));

    return view('welcome');
});

Route::get('/broad', function () {
    event(new UserSignedUp('JohnDoe'));

    return view('welcome');
});

Route::get('/test', function () {
    Redis::set('name', 'Timur');
    Cache::put('name1', 'Timur1', 10);

    return Redis::get('name') . '-' . Cache::get('name1');
});
