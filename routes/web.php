<?php

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('contacts', 'ContactsController@index')->name('contacts');
    Route::get('contacts/create', 'ContactsController@create')->name('contacts.create');
    Route::post('contacts/create', 'ContactsController@store')->name('contacts.store');
    Route::get('contacts/{contact}/edit', 'ContactsController@edit')->name('contacts.edit');
    Route::post('contacts/{contact}/update', 'ContactsController@update')->name('contacts.update');

    Route::get('companies', 'CompaniesController@index')->name('companies');
    Route::get('companies/create', 'CompaniesController@create')->name('companies.create');
    Route::post('companies/create', 'CompaniesController@store')->name('companies.store');
    Route::get('companies/{company}/edit', 'CompaniesController@edit')->name('companies.edit');
    Route::post('companies/{company}/update', 'CompaniesController@update')->name('companies.update');


    Route::get('orders', 'OrdersController@index')->name('orders');
    Route::get('orders/create', 'OrdersController@create')->name('orders.create');
    Route::post('orders/create', 'OrdersController@store')->name('orders.store');
    Route::get('orders/{contact}/edit', 'OrdersController@edit')->name('orders.edit');
    Route::post('orders/{contact}/update', 'OrdersController@update')->name('orders.update');
});

Route::get('/home', 'HomeController@index')->name('home');
