<?php

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    $query = http_build_query([
        'client_id' => '4',
        'redirect_uri' => 'http://localhost:9998/callback',
        'response_type' => 'code',
        'scope' => ''
    ]);


    return redirect("http://localhost:8001/oauth/authorize?$query");
});

Route::get('callback', function(Request $request)
{
    $code = $request->get('code');
    $http = new Client();

    $response = $http->post('http://localhost:8001/oauth/token', [
        'form_params' => [
            'client_id' => '4',
            'client_secret' => 'YCVMhBSayIAKGnJKpzrRcpg3QisdCMz8jPUrKYh2',
            'redirect_uri' => 'http://localhost:9998/callback',
            'code' => $code,
            'grant_type' => 'authorization_code',
        ]
    ]);
    dd(json_decode($response->getBody(), true));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


