<?php

Route::get('/', 'Admin\FrontController@index');
Route::get('/factions', 'Admin\FactionsController@index');
Route::get('/faction/{faction}/delete', 'Admin\FactionsController@delete')

?>