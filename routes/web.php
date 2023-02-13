<?php

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
    return view('home');
});

Route::controller(\App\Http\Controllers\ContainerPackageController::class)->group(function () {
    Route::group(['prefix' => 'container-packages', 'as' => 'container-packages.'], function () {
        Route::get('/', 'index')->name('index');
        Route::get('{id}/show', 'show')->name('show');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::patch('{id}/update', 'update')->name('update');
        Route::delete('{id}', 'destroy')->name('destroy');
    });
});
