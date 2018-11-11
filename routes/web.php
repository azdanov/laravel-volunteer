<?php

declare(strict_types=1);

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();
