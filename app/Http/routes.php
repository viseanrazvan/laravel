<?php

Route::get('/masini', 'MasiniController@index');

Route::get('/masini/filter', 'MasiniController@getWithFilters');

Route::get('/masini/addCar', 'MasiniController@addCar');