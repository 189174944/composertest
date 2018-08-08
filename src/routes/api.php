<?php
/**
 * Created by PhpStorm.
 * User: interface
 * Date: 2018/8/8
 * Time: 00:42
 */

Route::get('fullstackvalley/test', 'Hello\Controllers\IndexController@test');
Route::get('fullstackvalley/models/explore', 'Hello\Controllers\ModelsGenerateController@explore');
Route::get('fullstackvalley/views/explore', 'Hello\Controllers\ViewsGenerateController@explore');

