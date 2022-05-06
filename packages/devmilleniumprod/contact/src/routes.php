<?php

Route::get('/contact', 'Milleniumprod\Contact\ContactController@index')->name('contact.index');
Route::post('/contact', 'Milleniumprod\Contact\ContactController@store')->name('contact.store');