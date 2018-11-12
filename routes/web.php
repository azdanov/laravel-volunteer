<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Auth;

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();
