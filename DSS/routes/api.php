<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('branches','API\BranchesController@branches')->name('branches');
Route::get('devices','API\DevicesController@devices')->name('devices');
Route::post('devices','API\DevicesController@insert')->name('insert-device');
Route::get('categories','API\CategoriesController@categories')->name('categories');
Route::get('device-templates/{id}','API\DeviceTemplatesController@device_templates')->name('device_templates');
Route::get('log','API\DeviceTemplatesController@log')->name('log');
Route::post('update-device','API\DevicesController@update_device');
