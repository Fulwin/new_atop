<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Api'
], function($api) {
    $api->post('login', 'AuthController@login')->name('api.Auth.login');
    $api->post('logout', 'AuthController@logout')->name('api.Auth.logout');

    $api->group(['middleware' => 'refresh.token'], function($api) {
        // 用户列表
        $api->get('users', 'UsersController@index')->name('api.Users.index');
        // 所有用户
        $api->get('users_list', 'UsersController@usersList')->name('api.Users.usersList');
        // 部门列表
        $api->get('departments', 'CommonController@departments')->name('api.Common.departments');
        // 职位列表
        $api->get('posts', 'CommonController@posts')->name('api.Common.posts');
        // 级别列表
        $api->get('levels', 'CommonController@levels')->name('api.Common.levels');
        // 获取登录用户信息
        $api->post('profile', 'UsersController@profile')->name('api.Users.profile');
    });
});

$api->version('v2', function($api) {
    $api->get('users', function() {
        return response('this is version v2.');
    });
});