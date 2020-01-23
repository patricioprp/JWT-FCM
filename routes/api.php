<?php

Route::group([
    'prefix' => 'auth',
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('payload', 'AuthController@payload');
    //Guardar el token FCM
    Route::post('saveTokenFCM/{id}/{token}','AuthController@saveTokenFCM');
    //Guardar mensajes FCM
    Route::post('saveMessage/{title}/{text}/{id}','UserController@saveMessages');
    //Mostrar Mensajes
    Route::post('showMEssage/{id}','UserController@showMessages');
});
